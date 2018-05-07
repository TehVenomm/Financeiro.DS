<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Atividade 29/03</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$id_edicao = $_GET['id'];
			
			$sql = "SELECT * FROM lancamento WHERE idLancamento = '$id_edicao'";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();
			

			foreach($contatos as $bolacha)
			{
				$valor_edicao = $bolacha['valor'];
				$dataEfetuada_edicao = $bolacha['dataEfetuada'];
				$descricao_edicao = $bolacha['descricao'];
				$tipo_edicao = $bolacha['tipo'];
				$id_categoria_edicao = $bolacha['idCategoria_Lancamento'];
			}
			$contatos = NULL;
			
			/*if (is_null($valor_edicao)){
				header("location: notFound.php");
			}*/
			
			if(isset($_POST["enviar"]))
				{
					$valor = $_POST['valor_new'];
					$dataEfetuada = $_POST['dataEfetuada_new'];
					$descricao = $_POST['descricao_new'];
					$tipo = $_POST['tipo_new'];
					$idCategoria = $_POST['categoria_new'];
					
					
					include "conexao.php";
					$sql = "UPDATE lancamento_tb SET 
							valor = ?,
							dataEfetuada = ?,
							descricao = ?,
							tipo = ?,
							idCategoria = ?";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($valor, $dataEfetuada, $descricao, $tipo, $idCategoria));
					$contatos = NULL;
					
					header("location:listarDespesa.php");
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Atividade 29/03 - Edição de Despesa - Braz & Senes</center></h2>
			<hr>
		</header>
		
		<a href="index.php">
			<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
		</a>
		
		<div>
			<fieldset>
				<legend>
					Dados para Edição da despesa nro. <?php echo $id_edicao;?>:
				</legend>
				
				<hr>
				
				<form action="" method="POST">
					<p>
						Valor: <br>
						<input type="number" name="valor_new" value="<?= $valor_edicao ?>" maxlength="200" autofocus required>
					</p>
					
					<hr>
					
					<p>
						Tipo da despesa:<br>
						<input type='radio' name='tipo_new' value='D' <?php if($tipo_edicao == "D"){echo "selected";}?> required> Despesa 
						<input type='radio' name='tipo_new' value='R' <?php if($tipo_edicao == "R"){echo "selected";}?> required> Receita <br>
					</p>
					
					<hr>
					
					<p>
						Descricao: <br>
						<input type="text" name="descricao_new" value="<?= $descricao_edicao ?>" maxlength="200" autofocus required>
					</p>
					
					<hr>
					
					<p>
						Categoria: <br>
						<select name='categoria_new'>
						<?php
							include "chamaCategoria.php";
						?>
					</select>
					
					</p>
					
					<hr>
					
					<p>
						Data Realizada: <br>
						<input type="date" name="dataEfetuada_new" value="<?= $dataEfetuada_edicao ?>" maxlength="200" autofocus required>
					</p>
					
					<hr>
					
					<p>
						<input type="submit" value="enviar" name="enviar">
					</p>
				<form>
			</fieldset>
			
		</div>
	</body>
</html>