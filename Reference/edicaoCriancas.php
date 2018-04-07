<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Atividade 29/03</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$id_edicao = $_GET['id'];
			
			$sql = "SELECT * FROM crianca_tb WHERE idCrianca = '$id_edicao'";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();
			

			foreach($contatos as $bolacha)
			{
				$cricanca_edicao = $bolacha['nomeCrianca'];
				$responsavel_edicao = $bolacha['nomeResponsavel'];
			}
			$contatos = NULL;
			
			if (is_null($cricanca_edicao)){
				header("location: notFound.php");
			}
			
			if(isset($_POST["enviar"]))
				{
					
					$nomeCrianca = $_POST["crianca_new"];
					$nomeResponsavel = $_POST["responsavel_new"];
					
					
					include "conexao.php";
					$sql = "UPDATE crianca_tb SET 
							nomeCrianca = ?, 
							nomeResponsavel = ?
							WHERE idCrianca = ?";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($nomeCrianca, $nomeResponsavel, $id_edicao));
					$contatos = NULL;
					
					header("location:listarCriancas.php");
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Atividade 29/03 - Edição Cadastro de Crianças - Gabriel Braz</center></h2>
			<hr>
		</header>
		
		<a href="index.php">
			<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
		</a>
		
		<div>
			<fieldset>
				<legend>
					Dados para Edição do usuário nro. <?php echo $id_edicao;?>:
				</legend>
				
				<hr>
				
				<form action="" method="POST">
					<p>
						Nome da Criança: <br>
						<input type="text" name="crianca_new" value="<?= $cricanca_edicao ?>" maxlength="200" autofocus required>
					</p>
					
					<hr>
					
					<p>
						Nome do Responsável: <br>
						<input type="text" name="responsavel_new" value="<?= $responsavel_edicao ?>" maxlength="200" autofocus required>
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