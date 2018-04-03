<?php 
	try
	{	header('Content-Type: text/html;charset=utf-8');
		$conexao = new PDO("mysql:host=localhost;dbname=imagens_db;","root","");
		$conexao -> query("SET NAMES 'utf8'");
	}
	catch(PODExeption $e)
	{
		echo $e->getMessage();
	}
?>