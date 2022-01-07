<?php

namespace App\Repositories\Interfaces;

interface WeatherRepositoryInterface {
	public function get($city_lat, $city_long, $days);
	public function set($city_id, $weather_str);
}

?>