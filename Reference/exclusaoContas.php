<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Atividade 29/03</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$email_exclusao = $_GET['email'];
			if(isset($_POST['sim']))
			{
				include "conexao.php";
				$sql = "DELETE FROM usuario_tb WHERE email = '$email_exclusao'";
				$contatos = $conex -> prepare($sql);
				$contatos -> execute();
				$contatos= NULL;
				header("Location: listarContas-ADM.php");
			}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Atividade 29/03 - Exclusão Conta - Gabriel Braz</center></h2>
			<hr>
		</header>
		
			<h2 align="center">
			Deseja apagar a conta associada ao email: <br>"<?php echo $email_exclusao; ?>"?
			</h2>
			<div>
				<span align="center">
					<form action="" method="POST">
						<input type="submit" name="sim" value="Sim">
						<?php
							echo "<th>
									<a href='listarContas-ADM.php'>
										<input type='button' name='nao' value='Não'>
									</a>
								  </th>";
						?>
					</form>
				</span>
		</div>
	</body>
</html>