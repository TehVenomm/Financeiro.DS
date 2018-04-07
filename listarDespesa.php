<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Listar Dispesas Cadastradas</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Financeiro - Listar Dispesas Cadastradas- Braz & Senes</center></h2>
			<hr>
		</header>
		
		

		<div>
			<fieldset>
				<legend>
					Dados das Despesas:
				</legend>
				
				<a href="index.php">
					<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
				</a>
				
				<table border="1" style ="margin : 0 auto">
					<th>Valor</th>
					<th>Data Efetuada</th>
					<th>Descrição</th>
					<th>Tipo</th>
					<th>Categoria</th>
					<th>Usuario</th>
					<th colspan="2">Opções</th>
					
					<?php
						include "conexao.php";
						$sql = "SELECT * FROM lancamento AS L 
								INNER JOIN usuario AS U ON L.usuario_idUsuario = U.idUsuario
								INNER JOIN categoria AS C ON L.idCategoria_Lancamento = C.idCategoria
								ORDER BY dataEfetuada DESC";
						$contatos = $conex -> prepare($sql);
						$contatos -> execute();
						foreach($contatos as $x)
						{
								$valor = $x['valor'];
								$dataEfetuada = $x['dataEfetuada'];
								$descricao = $x['descricao'];
								$tipo = $x['tipo'];
								$categoria = $x['nome'];
								$usuario = $x['email'];					
								
								echo "<tr>";								
								echo "<th> R$:".$valor."</th>";
								echo "<th>".$dataEfetuada."</th>";
								echo "<th>".$descricao."</th>";
								echo "<th>".$tipo."</th>";
								echo "<th>".$categoria."</th>";
								echo "<th>".$usuario."</th>";

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