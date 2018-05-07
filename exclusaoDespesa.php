<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Atividade 29/03</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$id_exclusao = $_GET['id'];
			if(isset($_POST['sim']))
			{
				include "conexao.php";
				$sql = "DELETE FROM crianca_tb WHERE idCrianca = '$id_exclusao'";
				$contatos = $conex -> prepare($sql);
				$contatos -> execute();
				$contatos= NULL;
				header("Location: listarCriancas.php");
			}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Atividade 29/03 - Exclusão Cadastro Criança - Gabriel Braz</center></h2>
			<hr>
		</header>
		
			<h2 align="center">
			Deseja apagar este cadastro?
			</h2>
			<div>
				<span align="center">
					<form action="" method="POST">
						<input type="submit" name="sim" value="Sim">
						<?php
							echo "<th>
									<a href='listarCriancas.php'>
										<input type='button' name='nao' value='Não'>
									</a>
								  </th>";
						?>
					</form>
				</span>
		</div>
	</body>
</html>