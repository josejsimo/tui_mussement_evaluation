<?php

require_once 'includes.php';

use App\Controllers\WeatherController;

$weatherController = new WeatherController();

$cities_weather = $weatherController->getWeather(2);

foreach($cities_weather as $city_weather) {

	print($city_weather->city . ' | ');

	for($i=0; $i<count($city_weather->weather); $i++) {

		if($i == (count($city_weather->weather) - 1)) {
			print($city_weather->weather[$i]->condition);
		}
		else {
			print($city_weather->weather[$i]->condition . ' - ');	
		}
	}

	print("\n");
}

?>