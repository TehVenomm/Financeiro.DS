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
			<h2><center>Atividade 29/03 - Listar Cadastro de Crianças - Gabriel Braz</center></h2>
			<hr>
		</header>
		
		

		<div>
			<fieldset>
				<legend>
					Dados do Cadastro:
				</legend>
				
				<a href="index.php">
					<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
				</a>
				
				<table border="1" style ="margin : 0 auto">
					<th>ID</th>
					<th>Nome Criança</th>
					<th>Nome Responsável</th>
					<th colspan="2">Opções</th>
					
					<?php
						include "conexao.php";
						$sql = "SELECT * FROM crianca_tb
								GROUP BY idCrianca";
						$contatos = $conex -> prepare($sql);
						$contatos -> execute();
						foreach($contatos as $bolacha)
						{
								$id = $bolacha['idCrianca'];
								$nome_crianca = $bolacha['nomeCrianca'];					
								$nome_responsavel = $bolacha['nomeResponsavel'];					
								
								echo "<tr>";
								echo "<th>".$id."</th>";
								
								echo "<th>".$nome_crianca."</th>";
								
								echo "<th>".$nome_responsavel."</th>";
								
								echo "<th>
										<a href='edicaoCriancas.php?id=$id&editar=editar'>
											<img src='imagens/Expandir01.png' width='20px'>
										</a>
									  </th>";
								echo "<th>
										<a href='exclusaoCriancas.php?id=$id&editar=editar'>
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