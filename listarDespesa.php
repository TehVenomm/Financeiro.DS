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
			<a href="index.php" style="margin-left: 43%;">
					<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
			</a>
			
			<fieldset>
				<legend>
					Dados das Despesas:
				</legend>
				<table border="1" style ="margin : 0 auto">
					<th>Valor</th>
					<th>Tipo</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th>Data Efetuada</th>
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
								$id = $x['idLancamento'];
								$valor = $x['valor'];
								$dataEfetuada = $x['dataEfetuada'];
								$descricao = $x['descricao'];
								$tipo = $x['tipo'];
								$categoria = $x['nome'];
								$usuario = $x['email'];					
								
								echo "<tr>";								
								echo "<th> R$ ".number_format((float)$valor, 2, ',', '')."</th>";
								echo "<th>".$tipo."</th>";
								echo "<th>".$descricao."</th>";
								echo "<th>".$categoria."</th>";
								echo "<th>".$dataEfetuada."</th>";
								echo "<th>".$usuario."</th>";

								echo "<th>
										<a href='edicaoDespesa.php?id=$id&editar=editar'>
											<img src='imagens/Editar01.png' width='20px'>
										</a>
									  </th>";
								echo "<th>
										<a href='exclusaoDespesa.php?id=$id&editar=editar'>
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