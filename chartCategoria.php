<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Teste Chart</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$sql = "SELECT ifnull(categoria.nome, 'vazio') as nome, count(*) as qtd, SUM(lancamento.valor) as valor 
					FROM lancamento
					INNER JOIN categoria ON categoria.idCategoria = lancamento.idCategoria_Lancamento
					GROUP BY categoria.nome WITH ROLLUP";
			$categorias = $conex -> prepare($sql);
			$categorias -> execute();
		?>
		  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		  <script type="text/javascript">
			google.charts.load("current", {packages:['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			var formatter = new google.visualization.NumberFormat({decimalSymbol: ',',groupingSymbol: '.', negativeColor: 'red', negativeParens: true, prefix: 'R$ '});
			function drawChart() {
			  var data = google.visualization.arrayToDataTable([
				["Element", "Density", { role: "style" } ],
				<?php
					foreach ($categorias as $x)
					{
						$nome = $x['nome'];
						$valor = $x['valor'];
						if ($nome != "vazio") {
							echo "['$nome', {v: $valor, f: 'R$ $valor.00'}, '#252525'],";
						}
					}
				?>
			  ]);

			  var view = new google.visualization.DataView(data);
			  view.setColumns([0, 1,
							   { calc: "stringify",
								 sourceColumn: 1,
								 type: "string",
								 role: "annotation" },
							   2]);

			  var options = {
				title: "Gastos dentro de cada Categoria",
				width: '90%',
				height: 400,
				bar: {groupWidth: "25%"},
				legend: { position: "none" },
				
				hAxis: {
				  format: 'h:mm a',
				  viewWindow: {
					min: [7, 30, 0],
					max: [17, 30, 0]
				  }
				},
				vAxis: {
				  title: 'Valor (Em Reais - R$)'
				}
				
			  };
			  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
			  chart.draw(view, options);
		  }
		</script>

  </head>
  <body>
	<header>
		<hr>
		<h2><center>Projeto Financeiro - Gastos por Categoria - Braz & Senes</center></h2>
		<hr>
	</header>
	<div>
		<center>
			<input class="botaoTop" type="button" value="Menu Principal" name="index" onclick="location.href='index.php';" />
				
			<br>
			<hr>
		</center>

			
			<div id="columnchart_values" style="width: 900px; height: 300px; margin: 0 auto;"></div>
		
	</div>
  </body>
</html>