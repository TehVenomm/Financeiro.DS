<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Excluir Categoria</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$id_exclusao = $_GET['id'];
			if(isset($_POST['sim']))
			{
				include "conexao.php";
				$sql = "DELETE FROM categoria WHERE idCategoria = '$id_exclusao'";
				$contatos = $conex -> prepare($sql);
				$contatos -> execute();
				$contatos= NULL;
				header("Location: listarCategorias.php");
			}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Financeiro - Exclusão de Categoria - Braz & Senes</center></h2>
			<hr>
		</header>
		
			<h2 align="center">
			Deseja apagar a categoria selecionada?
			</h2>
			<div>
				<span align="center">
					<form action="" method="POST">
						<input type="submit" name="sim" value="Sim">
						<?php
							echo "<th>
									<a href='listarCategoria.php'>
										<input type='button' name='nao' value='Não'>
									</a>
								  </th>";
						?>
					</form>
				</span>
		</div>
	</body>
</html>