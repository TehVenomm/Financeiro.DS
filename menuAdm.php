<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Menu Adm</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$nroTipoPg = 1;
			include "validaSessao.php";
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Financeiro - Painel ADM - Braz & Senes</center></h2>
			<hr>
		</header>


		<div>
			<fieldset>
				<legend>
					<p>Painel</p>
				</legend>
				
					<table border="0" style ="margin : 0 auto">
						<tr>
							<th>
								<a href=" cadastroDespesa.php">
									<input type="button" value="Cadastro de Despesa"/>
								</a>
							</th>
							<th>
								<a href="listarDespesa.php">
									<input type="button" value="Listar Despesas"/>
								</a>
							</th>
							<th>
								<a href="listarCategorias.php">
									<input type="button" value="Gerenciar Categorias"/>
								</a>
							</th>
						</tr>
					</table>
				
				
				<hr>
				
				<a href="logOut.php">
					<input class="botaoTop" type="button" value="Logout" name="logout" align="center">
				</a>
				
			</fieldset>
			
			
		</div>

	</body>
</html>