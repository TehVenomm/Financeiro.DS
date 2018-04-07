<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Projeto Financeiro</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$email_login = $_POST['email'];
			$senha_login = $_POST['senha'];
			$sql = "SELECT * FROM usuario WHERE email = ?";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute(array($email_login));

			$qtd = $contatos -> rowCount();
			
			foreach($contatos as $bolacha)
			{
				$email_compare 	= $bolacha['email'];
				$senha_compare 	= $bolacha['senha'];
				$perfil_compare = $bolacha['tipoConta'];
			}
			
			if($qtd == 1){
				if(md5($senha_login) == $senha_compare){
					session_start();
					$_SESSION['email']	= $email_compare;
					
					if ($perfil_compare == 1){
						header("Location: menuAdm.php");
						$_SESSION['perfil'] = $perfil_compare;
					}
					
					if ($perfil_compare == 0){
						header("Location: menuAtendente.php");
						$_SESSION['perfil'] = $perfil_compare;
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
			<h2><center>Projeto Financeiro - Login - Braz & Senes</center></h2>
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