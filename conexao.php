<?php
	try
	{
		header('Content-Type: text/html; charset=utf-8');
		$conex = new PDO("mysql:host=192.168.1.54;dbname=financeiro_bd;charset=utf8","braz","");
		$conex -> query("SET NAMES 'utf8'");
	}
	catch(PDOexception $e)
	{
		echo $e->getMessage();
	}
?>