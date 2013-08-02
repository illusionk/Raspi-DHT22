<?php

// Current data
$file = fopen('docs/sys/cpu_temp.txt', 'r');

$data = fread($file, filesize('docs/sys/cpu_temp.txt'));
echo $date;

fclose($file);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>阿寶去冰斗工作室 System</title>
		<meta charset='utf-8'> 
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/uikit.min.css" />
		<script src="js/uikit.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	</head>
	<body style="padding-top:70px;">
		<div class="uk-container uk-width-medium-1-2 uk-container-center uk-text-center">
			<div class="uk-grid">
				<div class="uk-width-medium-1-1">
					<div class="uk-panel uk-panel-box">
						<h1 class="uk-panel-title"><i class="uk-icon-location-gear"></i> Raspi system info</h1>
					</div>
				</div>
			</div>
			<div class="uk-grid">
				<div class="uk-width-medium-1-1">
					<div class="uk-panel uk-panel-box">
						<h3 class="uk-panel-title"><i class="uk-icon-sun"></i> CPU Temp(*C)</h3>
						<div class="uk-align-center"><h1>
	<?php
		echo ((float)$data/1000)." *C";
	?>
						</h1></div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
