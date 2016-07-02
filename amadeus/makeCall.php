<?php
	/**
	 * Created by PhpStorm.
	 * User: Oliver
	 * Date: 02/07/2016
	 * Time: 20:28
	 */
	require_once  'config.php';

	header('Content-Type: application/json');

	if(!empty($API_KEY)){
		if($_GET['transport'] === 'car_hire'){
			$call = 'https://api.sandbox.amadeus.com/v1.2/cars/search-airport?apikey=' . $API_KEY . '&location=' . $_GET['airport'] . '&pick_up='. date('Y-m-d', strtotime($_GET['pickUp'])) .'&drop_off=' . date('Y-m-d', strtotime($_GET['dropOff'])) . '&lang=EN&currency=EUR';
		}
		$data = file_get_contents($call);
		echo $data;
	}else{
		echo json_encode(['failure' => 'Amadeus Travel Innovation Sandbox API Key variable must be set in amadeus/config.php file.']);
	}