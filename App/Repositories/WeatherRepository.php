<?php

namespace App\Repositories;

use App\Repositories\Interfaces\WeatherRepositoryInterface;

use Config\AppConfig;
use App\Services\HttpService;
use App\Repositories\Common\Repository;

class WeatherRepository extends Repository implements WeatherRepositoryInterface {

	function __construct() {
		$this->api_url = AppConfig::$WeatherApi;
	}

	public function get($city_lat, $city_long, $days) {
		try {

			return json_decode(HttpService::HttpRequest($this->api_url . '&q=' . $city_lat . ',' . $city_long . '&days=' . $days));
		}
		catch(\Throwable $ex) {
			throw $ex;
		}
	}

	public function set($city_id, $weather_str) {

	}
}

?>