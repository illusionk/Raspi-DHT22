<?php

// Current data
$file = fopen('docs/temp.txt', 'r');

$data = fscanf($file, "%s %s %f %f\n");
list($current_date, $current_time, $current_temp, $current_hud) = $data;
$current_date = $current_date." ".$current_time;

fclose($file);

// Read history data
$file = fopen('docs/last10.txt', 'r');

$past_date = array();
$past_temp = array();
$past_hud =array();

for ($i = 0; $i < 10; $i++ ){
	$data = fscanf($file, "%s %s %f %f\n");
	list($cell_date, $cell_time, $cell_temp, $cell_hud) = $data;
	$cell_date = $cell_date." ".$cell_time;

	array_push($past_date, $cell_date);
	array_push($past_temp, $cell_temp);
	array_push($past_hud, $cell_hud);
}

fclose($file);
?>

<!DOCTYPE html>
<html class="uk-height-1-1">
	<head>
		<title> 阿寶去冰斗工作室 Meter</title>
		<meta charset='utf-8'> 
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/uikit.min.css" />
		<script src="js/uikit.min.js"></script>

	    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	    <script type="text/javascript">
	      google.load("visualization", "1", {packages:["corechart"]});
	      google.setOnLoadCallback(drawChart);
	      function drawChart() {

	      	// Draw Temperature
	        var data_temp = new google.visualization.DataTable();
	        data_temp.addColumn('string', 'Date');
	        data_temp.addColumn('number', 'Temperature(*C)');
	        data_temp.addRows([
<?php
for($i = 5; $i < 9; $i++)
	echo "			  ['".$past_date[$i]."', ".$past_temp[$i]."],\n";
echo "			  ['".$past_date[$i]."', ".$past_temp[$i]."]\n";
?>
	        ]);

	        var options_temp = {
	        	pointSize: 5,
	        	legend: 'none'
	        };

	        var chart_temp = new google.visualization.LineChart(document.getElementById('chart_temp'));
	        chart_temp.draw(data_temp, options_temp);

	        // Draw Humidity
	        var data_hud = new google.visualization.DataTable();
	        data_hud.addColumn('string', 'Date');
	        data_hud.addColumn('number', 'Humidity(%)');
	        data_hud.addRows([
<?php
for($i = 5; $i < 9; $i++)
	echo "			  ['".$past_date[$i]."', ".$past_hud[$i]."],\n";
echo "			  ['".$past_date[$i]."', ".$past_hud[$i]."]\n";
?>
	        ]);

	        var options_hud = {
	        	pointSize: 5,
	        	legend: 'none',
	          	colors: ['#e0440e']
	        };

	        var chart_hud = new google.visualization.LineChart(document.getElementById('chart_hud'));
	        chart_hud.draw(data_hud, options_hud);
	      }
	    </script>


	</head>
	<body class="uk-height-1-1">

		<div class="uk-container uk-width-medium-2-3 uk-container-center uk-text-center" style="padding-top:30px;padding-bottom:30px;">
			<div class="uk-grid">
				<div class="uk-width-medium-1-1">
					<div class="uk-panel uk-panel-box">
						<h3 class="uk-panel-title"><i class="uk-icon-location-arrow"></i> Location</h3>
						<div class="uk-align-center"><h1>Taipei home</h1></div>
					</div>
				</div>
			</div>
			<div class="uk-grid">
				<div class="uk-width-medium-1-2">
					<div class="uk-panel uk-panel-box">
						<h3 class="uk-panel-title"><i class="uk-icon-sun"></i> Temperature</h3>
						<div class="uk-align-center"><h1>
	<?php
		echo $current_temp." *C";
	?>
						</h1></div>
					</div>
				</div>
				<div class="uk-width-medium-1-2">
					<div class="uk-panel uk-panel-box">
						<h3 class="uk-panel-title"><i class="uk-icon-tint"></i> Humidity</h3>
						<div class="uk-align-center"><h1>
	<?php
		echo $current_hud." %";
	?>
						</h1></div>
					</div>
				</div>
			</div>
			<div class="uk-grid">
				<div class="uk-width-medium-1-2">
					<div class="uk-panel uk-panel-box" style="height:90px;">
						<h3 class="uk-panel-title"><i class="uk-icon-refresh"></i> Last update</h3>
						<div class="uk-align-center"><h2>
		<?php
			echo $current_date;
		?>
						</h2></div>
					</div>
				</div>
				<div class="uk-width-medium-1-2">
					<div class="uk-panel uk-panel-box" style="height:90px;">
						<a href="." style="font-size:35px;" class="uk-icon-refresh uk-icon-large"></a>
					</div>
				</div>
			</div>
			<div class="uk-grid">
				<div class="uk-width-medium-1-1">
					<div class="uk-panel uk-panel-box">
						<h3 class="uk-panel-title"><i class="uk-icon-bar-chart"></i> Temperature<small> (*C)</small> history </br><small> (Refresh every 30 mins)</small></h3>
						<div id="chart_temp" ></div>
					</div>
				</div>
			</div>
			<div class="uk-grid">
				<div class="uk-width-medium-1-1">
					<div class="uk-panel uk-panel-box">
						<h3 class="uk-panel-title"><i class="uk-icon-bar-chart"></i> Humidity<small> (%)</small> history </br><small> (Refresh every 30 mins)</small></h3>
						<div id="chart_hud" ></div>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
