<?php

	// Current data

	// Read data
	$file = fopen('docs/temp.txt', 'r');
	$data = fscanf($file, "%s %s %f %f\n");
	fclose($file);

	// Split
	list($current_date, $current_time, $current_temp, $current_hud) = $data;
	$current_date = $current_date." ".$current_time;

	// Return
	echo $current_date." ".$current_temp." ".$current_hud;

	/*
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
	*/

?>