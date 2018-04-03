<?php
	$id = "";
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$img = $_FILES["imagem"];
	
	$titulo_img = $img["name"];
	$tamanho_image = $img["size"];
	$tmp_img = $img["tmp_name"];
	$formato = pathinfo($titulo_img, PATHINFO_EXTENSION);
	$link_img = uniqid().".".$formato;
	
	echo "Nome: ".$nome."<br>";
	echo "E-Mail: ".$email."<br>";
	echo "Nome-Aluno: ".$titulo_img."<br>";
	echo "Tamanho Arquivo: ".$tamanho_image."<br>";
	echo "Caminho Temporario: ".$tmp_img."<br>";
	echo "Extensão Arquivo: ".$formato."<br>";
	echo "Nome ".$link_img;
	$upload = move_uploaded_file($tmp_img, 'Imagens_Salvas/'.$link_img);
	
	if(isset($upload))
	{
		include "conexao.php";
		$sql = "INSERT INTO contatos_tb VALUES (?, ?, ?, ?)";
		$clientes = $conexao -> prepare($sql);
		$clientes -> execute(array($id, $nome, $email, $link_img));
		$conexao = null;
	}
	
?>