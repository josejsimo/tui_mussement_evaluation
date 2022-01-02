<?php

//config

include_once('Config/AppConfig.php');

//controllers

include_once('App/Controllers/WeatherController.php');

//libraries

include_once('App/Libraries/CityWeatherProcessor.php');

//repositories

include_once('App/Repositories/Interfaces/RepositoryInterface.php');

include_once('App/Repositories/CityRepository.php');
include_once('App/Repositories/WeatherRepository.php');

//services

include_once('App/Services/HttpService.php');
include_once('App/Services/XmlService.php');

?>