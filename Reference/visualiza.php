<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF8">
		<style>
			img.tabela{
				max-width: 100px;
			}
		</style>
	</head>
	<body>
		<center>
			<table border="1">
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Imagem</th>
				</tr>
				<?php
					include "conexao.php";
					$sql = "SELECT * FROM contatos_tb";
					$clientes = $conexao -> prepare($sql);
					$clientes -> execute();
					
					foreach($clientes as $sanduba)
					{
						$id_bd = $sanduba['id_contato'];
						$nome_bd = $sanduba['nome'];
						$email_bd = $sanduba['email'];
						$img_name_bd = $sanduba['link_imagem'];
						
						echo 
							"<tr>
								<th>$id_bd</th>
								<th>$nome_bd</th>
								<th>$email_bd</th>
								<th> 
									<img class='tabela' src='Imagens_Salvas/$img_name_bd' alt='$img_name_bd'>
								</th>
							</tr>";
					}
					$conexao = null;
				?>			
			</table>
			<a href="carregar_img.php">
				<input type="button" name="cadastrar" value="Cadastrar">
			</a>
		</center>
	</body>
</html>