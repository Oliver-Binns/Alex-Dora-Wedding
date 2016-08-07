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
		$sandbox_url = 'https://api.sandbox.amadeus.com/v1.2/';
		$api_key = '?apikey=' . $API_KEY;
		$latitude = $_GET['latitude'];
		$longitude = $_GET['longitude'];

		$journeys = [];
		/*if($_GET['transport'] === 'car_hire'){
			$call = 'https://api.sandbox.amadeus.com/v1.2/cars/search-airport?apikey=' . $API_KEY . '&location=' . $_GET['airport'] . '&pick_up='. date('Y-m-d', strtotime($_GET['pickUp'])) .'&drop_off=' . date('Y-m-d', strtotime($_GET['dropOff'])) . '&lang=EN&currency=EUR';
		}
		$data = file_get_contents($call);
		echo $data;*/
		if($_GET['country'] !== 'GR'){
			//Get cities for airport...
			$call = $sandbox_url . 'airports/nearest-relevant' . $api_key . '&latitude=' . $latitude . '&longitude=' . $longitude;
			$airports = json_decode(file_get_contents($call));
			$cities = [];
			foreach($airports as $airport){
				array_push($cities, $airport->city);
			}
			array_unique($cities);

			//Get flights for each city-
			foreach($cities as $city){
				$destinations = ['ATH', 'SKG'];

				foreach($destinations as $destination){
					$call = $sandbox_url . 'flights/low-fare-search'.$api_key.'&origin='.$city.'&destination='.$destinations.'&currency=EUR';


				}
			}
		}

		echo json_encode(['result' => 'success', 'journeys' => $journeys]);
	}else{
		echo json_encode([
			'result' => 'failure',
			'errorMessage' => 'Amadeus Travel Innovation Sandbox API Key variable must be set in amadeus/config.php file.'
		]);
	}