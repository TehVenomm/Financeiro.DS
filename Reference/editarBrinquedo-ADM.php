<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Atividade 29/03</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />


		<?php
			include "conexao.php";
			
			$sql = "SELECT * FROM brinquedo_tb WHERE idBrinquedo = 1";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();
			$qtd = $contatos -> rowCount();
			
			if($qtd == 1){
				foreach($contatos as $bolacha)
				{
					$p_hora_edicao = $bolacha['precoHora'];
					$limite_crianca_edicao = $bolacha['limiteCrianca'];
				}
			}
			$contatos = NULL;
			
			if (is_null($p_hora_edicao)){
				header("location: notFound.php");
			}
			
			if(isset($_POST["enviar"]))
				{
					
					$preco_hora = $_POST["hora_new"];
					$limite_crianca = $_POST["criancas_new"];
					
					include "conexao.php";
					$sql = "UPDATE brinquedo_tb SET 
							precoHora = ?, 
							limiteCrianca = ?
							WHERE idBrinquedo = 1";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($preco_hora, $limite_crianca));
					$contatos = NULL;
					
					header("location:menuAdm.php");
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Atividade 29/03 - Edição do Brinquedo - Gabriel Braz</center></h2>
			<hr>
		</header>
		
		<a href="menuADM.php">
			<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
		</a>
		
		<div>
			<fieldset>
				<legend>
					Dados para Edição do Brinquedo:
				</legend>
				
				<hr>
				
				<form action="" method="POST">
					<p>
						Valor da Hora (Exemplo: 1,30 REAIS): <br>
						<input type="number" step="0.01" name="hora_new" min="0.00" value="<?= $p_hora_edicao ?>" required>
					</p>
					
					<hr>
					
					<p>
						Limite de Crianças:<br>
						<input type="number" name="criancas_new" min="1" value="<?php echo $limite_crianca_edicao; ?>" required>
					</p>
					
					<hr>
					
					<p>
						<input type="submit" value="enviar" name="enviar">
					</p>
				<form>
			</fieldset>
			
		</div>
	</body>
</html>