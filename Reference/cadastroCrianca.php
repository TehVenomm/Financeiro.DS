<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Atividade 29/03</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
				if(isset($_POST["salvar"]))
				{	
					
					$id = "";
					$nomeCrianca = $_POST["nome_crianca"];
					$nomeResponsavel = $_POST["nome_responsavel"];
					
					include "conexao.php";
					$sql = "INSERT INTO crianca_tb VALUES(?, ?, ?)";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($id, $nomeCrianca, $nomeResponsavel));
					$contatos = NULL;
					
					header("location:index.php");
					
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Atividade 29/03 - Cadastro de Crianças - Gabriel Braz</center></h2>
			<hr>
		</header>
		
			<a href="index.php">
				<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
			</a>
			<div class="cadastro">
				<fieldset>
					<legend>
						Dados do Cadastro:<br>
					</legend>
					<form action="" method="POST">
						<p>
							Nome da Criança: <br>
							<input type="text" name="nome_crianca" maxlength="200" autofocus required>
						</p>
						
						<hr>
						
						<p>
							Nome do Responsável:<br>
							<input type="text" name="nome_responsavel" maxlength="200" required>
						</p>
						
						<hr>
						
						<p>
							<input type="submit" value="salvar" name="salvar">
						</p>
					<form>
				</fieldset>
			</div>
		
	</body>
</html>