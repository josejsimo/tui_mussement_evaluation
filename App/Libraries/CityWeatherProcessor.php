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

	public function getWeatherForCities() {

		try {

			$cities = $this->cityRepository->get();

			return $cities;

		}
		catch(Throwable $ex) {
			throw $ex;
		}
	} 
}

?>