<?php
	include "conexao.php";
	$script = "SELECT * FROM categoria";
	$resultado = $conex -> prepare($script);
	$resultado -> execute();
	
	foreach($resultado as $x)
	{
		$idCategoria = $x['idCategoria'];
		$nomeCategoria = $x['nome'];
		
		if($id_categoria_edicao == $idCategoria)
		{
			echo "<option selected value='$idCategoria'>$nomeCategoria</option>";
		}
		else
		{
			echo "<option value='$idCategoria'>$nomeCategoria</option>";
		}
	}
?>