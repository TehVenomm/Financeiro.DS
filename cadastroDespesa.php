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
			//include "validaExistencia.php"
			include "conexao.php";
			
			$valor = $_POST['valor'];
			$dataEfetuada = $_POST['dataRealizada'];
			$descricao = $_POST['descricao'];
		?>

		<div>
			<fieldset>
				<form action="" method="POST">
					Valor da Despesa:
					<input type='number' name='valor' placeholder='Insira o valor da sua despesa' required> <br>
					Data efetuada:
					<input type='date'   name='dataRealizada' > <br>
					Descrição:
					<input type='number' name='descricao' placeholder='Descreva a despesa' required> <br>
					Tipo da despesa:<br>
					<input type='radio' name='tipo' value='1'  required> Despesa 
					<input type='radio' name='tipo' value='2'  required> Receita <br>
					Categoria:<br>
					<select>
						<?php
							include "chamaCategoria.php";
						?>
					</select>
				</form>
			</fieldset>	
		</div>
	</body>
</html>