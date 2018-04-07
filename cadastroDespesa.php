<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Cadastro de Despesas</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Financeiro - Cadastro de Despesas - Braz & Senes</center></h2>
			<hr>
		</header>
		<?php
			include "validaExistencia.php";
			include "conexao.php";
			
			if(isset($_POST['cadastrar']))
			{
				$valor = $_POST['valor'];
				$dataEfetuada = $_POST['dataRealizada'];
				$descricao = $_POST['descricao'];
				$tipo = $_POST['tipo'];
				$categoria = $_POST['categoria'];
				$idUsuario = $_SESSION['idUsuario'];
				
				$script = "INSERT INTO lancamento VALUES (?,?,?,?,?,?,?)";
				$resultado = $conex -> prepare($script);
				$resultado -> execute(array('',$valor,$dataEfetuada,$descricao,$tipo,$categoria,$idUsuario));
				header('location:menuAdm.php');
			}
		?>

		<div>
			<fieldset>
				<form action="" method="POST">
					Valor da Despesa: R$:
					<input type='text' name='valor' placeholder='Insira o valor da despesa' required> <br>
					Data efetuada:
					<input type='date'   name='dataRealizada' > <br>
					Descrição:
					<input type='text' name='descricao' placeholder='Descreva a despesa' required> <br>
					Tipo da despesa:<br>
					<input type='radio' name='tipo' value='D'  required> Despesa 
					<input type='radio' name='tipo' value='R'  required> Receita <br>
					Categoria:<br>
					<select name='categoria'>
						<?php
							include "chamaCategoria.php";
						?>
					</select>
					
					<input type='submit' name='cadastrar' value='Cadastrar'>
				</form>
			</fieldset>	
		</div>
	</body>
</html>