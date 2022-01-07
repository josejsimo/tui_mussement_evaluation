<?php

namespace App\Libraries;

use App\Repositories\CityRepository;
use App\Repositories\WeatherRepository;

class CityWeatherProcessor {

	private $cityRepository = null;
	private $weatherRepository = null;

	function __construct() {
		$this->cityRepository = new CityRepository();
		$this->weatherRepository = new WeatherRepository();
	}

	public function getWeatherForCities($days) {

		try {

			//City data abstracted from business logic. The get function can return data from an API or from a db of any type with total abstraction.
			$cities = $this->cityRepository->get();

			//Test it city data correct
			if(!is_array($cities)) {
				throw new \Exception("Invalid data format for cities");
			}

			$cities_weather = Array();

			foreach ($cities as $city) {
				$city_weather = $this->getWeatherForCity($city, $days);
				array_push($cities_weather, $city_weather);
			}

			return $cities_weather;

		}
		catch(\Throwable $ex) {
			throw $ex;
		}
	} 

	private function getWeatherForCity($city, $days) {
		try {

			//Weather data abstracted from business logic. The get function can return data from an API or from a db of any type with total abstraction.
			$weather = $this->weatherRepository->get($city->latitude, $city->longitude, $days);

			//Test if weather data correct
			if(!is_array($weather->forecast->forecastday)) {
				throw new \Exception("Invalid forecast for city " . $city->name);
			}

			$city_weather = Array();

			foreach ($weather->forecast->forecastday as $forecast) {

				//Test if forecast condition data correct
				if(empty($forecast->day->condition->text)) {
					throw new \Exception("No weather condition for day " . $day . " and city " . $city->name);
				}

				$day_weather = new \stdClass();
				$day_weather->date = $forecast->date;
				$day_weather->condition = $forecast->day->condition->text;

				array_push($city_weather, $day_weather);

			}

			$city_weather_obj = new \stdClass();
			$city_weather_obj->city = $city->name;
			$city_weather_obj->weather = $city_weather;

			return $city_weather_obj;

		}
		catch(\Throwable $ex) {
			throw $ex;
		}
	}
	
}

?>