<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Editar Categoria</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
		
		
			include "conexao.php";
			$id_edicao = $_GET['id'];
			
			$sql = "SELECT * FROM categoria WHERE idCategoria = '$id_edicao'";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();
			

			foreach($contatos as $bolacha)
			{
				$nome_edicao = $bolacha['nome'];
			}
			$contatos = NULL;
			
			
			if(isset($_POST["enviar"]))
				{
					$nome = $_POST['nome_new'];
					
					
					include "conexao.php";
					$sql = "UPDATE categoria SET 
							nome = ?
							WHERE idCategoria = ?";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($nome, $id_edicao));
					$contatos = NULL;
					header("location:listarCategorias.php");
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Financeiro - Edição de Categoria - Braz & Senes</center></h2>
			<hr>
		</header>
		
		<a href="index.php">
			<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
		</a>
		
		<div>
			<fieldset>
				<legend>
					Dados para Edição da categoria nro. <?php echo $id_edicao;?>:
				</legend>
				
				<hr>
				
				<form action="" method="POST">
					<p>
						Nome: <br>
						<input type="text" name="nome_new" value="<?= $nome_edicao ?>" maxlength="200" autofocus required>
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