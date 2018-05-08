<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Listar Categorias Cadastradas</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Financeiro - Listar Categorias - Braz & Senes</center></h2>
			<hr>
		</header>
		
		

		<div><center>
			<input class="botaoTop" type="button" value="Menu Principal" name="index" onclick="location.href='index.php';" />
			
			<br><br>
			
			<input class="botaoTop" type="button" value="Cadastrar nova Categoria" name="cadastroCategoria" onclick="location.href='cadastroCategoria.php';" //>
			
			<br><br>
			
			<input class="botaoTop" type="button" value="Visualisar Despesas por Categoria" name="chartCategoria" onclick="location.href='chartCategoria.php';"/>
			
			</center>
			<fieldset>
				<legend>
					Categorias Cadastradas:
				</legend>
				<table border="1" style ="margin : 0 auto">
					<th>Nome</th>
					<th colspan="2">Opções</th>
					
					<?php
						include "conexao.php";
						$sql = "SELECT * FROM categoria 
								ORDER BY nome DESC";
						$contatos = $conex -> prepare($sql);
						$contatos -> execute();
						foreach($contatos as $x)
						{
								$id = $x['idCategoria'];
								$nome = $x['nome'];					
								
								echo "<tr>";
								echo "<th>".$nome."</th>";
								echo "<th>
										<a href='edicaoCategoria.php?id=$id&editar=editar'>
											<img src='imagens/Editar01.png' width='20px'>
										</a>
									  </th>";
								echo "<th>
										<a href='exclusaoCategoria.php?id=$id&editar=editar'>
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