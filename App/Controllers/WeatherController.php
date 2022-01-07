<?php

namespace App\Controllers;

use App\Libraries\CityWeatherProcessor;

class WeatherController {

	private $cityWeather = null;

	function __construct() {
		$this->cityWeather = new CityWeatherProcessor();
	}

	public function getWeather($days = 1) {
		try {

			//Prevent injections
			if(!is_int($days)) {
				throw new \Exception("Invalid format for days");
			}

			return $this->cityWeather->getWeatherForCities($days);
		}
		catch(\Throwable $ex) {
			print("Error message " . $ex->getMessage());
			
		}
		
	}
	
}

?>