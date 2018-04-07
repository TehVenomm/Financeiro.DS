<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Atividade 29/03</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "redirecionaSessao.php";
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Atividade 29/03 - LOGIN - Gabriel Braz</center></h2>
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
								Conta ADM: "gabrielbrazs@gmail.com"
								Senha ADM: "123456789"
							</th>
						</tr>
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