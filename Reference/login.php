<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Atividade 29/03</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$email_login = $_POST['email'];
			$senha_login = $_POST['senha'];
			$sql = "SELECT * FROM usuario_tb WHERE email = '$email_login'";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();

			$qtd = $contatos -> rowCount();
			
			foreach($contatos as $bolacha)
			{
				$email_compare 	= $bolacha['email'];
				$senha_compare 	= $bolacha['senha'];
			}
			
			if($qtd == 1){
				if(md5($senha_login) == $senha_compare){
					session_start();
					$_SESSION['email']	= $email_compare;
					$_SESSION['perfil'] = $nroPerfil;
					
					if ($email_compare == "gabrielbrazs@gmail.com"){
						header("Location: menuAdm.php");
						$_SESSION['perfil'] = 1;
					}
					
					if ($email_compare != "gabrielbrazs@gmail.com"){
						header("Location: menuAtendente.php");
						$_SESSION['perfil'] = 2;
					}
					
				} else {
					$mensagem = "E-mail ou senha incorretos!";
				}
			} else {
				$mensagem = "E-mail ou senha incorretos!";
			}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Atividade 29/03 - Login - Gabriel Braz</center></h2>
			<hr>
		</header>
		
		<center>
		<div>
				<fieldset>
					
					<p>
						<?php echo $mensagem; ?>
					</p>
					
					<hr>
					
					<p>
						<a href="index.php">
							<input type="button" value="Retornar" name="retorno">
						</a>
					</p>
				</fieldset>
			
			<form>
		</div>
		</center>
	</body>
</html>