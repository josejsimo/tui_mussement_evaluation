<?php

namespace App\Controllers;

use App\Libraries\CityWeatherProcessor;

class WeatherController {

	private $cityWeather = null;

	function __construct() {
		$this->cityWeather = new CityWeatherProcessor();
	}

	public function getWeather() {
		try {

			return $this->cityWeather->getWeatherForCities();
			
		}
		catch(Throwable $ex) {
			print($ex->getMessage);
		}
		
	}
	
}

?>