<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Projeto Financeiro</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "redirecionaSessao.php";
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Financeiro - LOGIN - Braz & Senes</center></h2>
			<hr>
		</header>
		

		<div>
			<fieldset>
				<legend>
					<p>Realize seu login:</p>
				</legend>
				<form action="login.php" method="POST">
					<table border="0" style ="margin : 0 auto">
						<tr>
							<th>
								<input type="text" name="email" required placeholder="E-Mail"/>
							</th>
						</tr>
						
						<tr>
							<th>
								<input type="password" name="senha" required placeholder="Senha"/>
							</th>
						</tr>
						
						<tr>
							<th>
								<input type="submit" value="Login" name="login">
							</th>
						</tr>
						
						
					</table>
				</form>
			</fieldset>
		</div>
	</body>
</html>