<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Projeto Financeiro</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Financeiro - Cadastro de Categorias - Braz & Senes</center></h2>
			<hr>
		</header>
		<?php
			include "validaExistencia.php";
			
			
			if(isset($_POST['cadastrar']))
			{
				$nome_cadastro = $_POST['nome'];
				$nome_cadastro = trim($nome_cadastro);
				
				include "conexao.php";
				$sql = "SELECT * FROM categoria WHERE nome LIKE '%?%'";
				$resultSQL = $conex -> prepare($sql);
				$resultSQL -> execute(array($nome_cadastro));
			
				$qtd = $resultSQL -> rowCount();
				
				echo $qtd;
				if($qtd > 0)
				{
					echo "<script>
						alert('Categoria Já Existente!');
						</script>";
					unset($_POST['cadastrar']);
					$resultSQL = NULL;
					
				} else {
					$sql = "INSERT INTO categoria 	(`idCategoria`, `nome`) 
							VALUES 					(?, ?)";
					$resultSQL = $conex -> prepare($sql);
					$resultSQL -> execute(array('', $nome_cadastro));
					$resultSQL = NULL;
					echo "<script>
						alert('Categoria Cadastrada!');
						</script>";
				}
			
			}
		?>
		<div>
			<fieldset>
				<form action="" method="POST">
					<p>
					Insira o nome da nova categoria:
					</p>
					<input type="text" name="nome" maxlength="200" autofocus required>
					<input type="submit" value="Cadastrar" name="cadastrar">
				</form>
			</fieldset>	
		</div>
	</body>
</html>