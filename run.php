<?php

require_once 'includes.php';

use App\Controllers\WeatherController as WeatherController;

$weather = new WeatherController();

print_r($weather->getWeather());

?>