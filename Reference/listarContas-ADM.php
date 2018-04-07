<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Atividade 29/03</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Atividade 29/03 - Listar Contas de Atendente - Gabriel Braz</center></h2>
			<hr>
		</header>
		
		

		<div>
			<fieldset>
				<legend>
					Dados do Cadastro:
				</legend>
				
				<a href="menuADM.php">
					<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
				</a>
				
				<table border="1" style ="margin : 0 auto">
					<th>ID</th>
					<th>E-Mail</th>
					<th colspan="2">Opções</th>
					
					<?php
						include "conexao.php";
						$sql = "SELECT * FROM usuario_tb
								WHERE idUsuario > 1
								GROUP BY idUsuario";
						$contatos = $conex -> prepare($sql);
						$contatos -> execute();
						foreach($contatos as $bolacha)
						{
								$id = $bolacha['idUsuario'];
								$email = $bolacha['email'];					
								
								echo "<tr>";
								echo "<th>".$id."</th>";
								
								echo "<th>".$email."</th>";
								
								echo "<th>
										<a href='edicaoContas.php?email=$email&editar=editar'>
											<img src='imagens/Expandir01.png' width='20px'>
										</a>
									  </th>";
								echo "<th>
										<a href='exclusaoContas.php?email=$email&editar=editar'>
											<img src='imagens/Lixo01.png' width='20px'>
										</a>
									  </th>";
								
								echo "</tr>";
						}
						$contatos= NULL;
					?>
				
				</table>
			</fieldset>
		</div>
	</body>
</html>