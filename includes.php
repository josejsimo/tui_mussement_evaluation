<?php

/**
 * PHP version 7.4
 *
 * @category Includes
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

// Config.
require_once 'Config/AppConfig.php';

// Controllers.
require_once 'App/Controllers/WeatherController.php';

// Libraries.
require_once 'App/Libraries/CityWeatherProcessor.php';

// Repositories.
require_once 'App/Repositories/Interfaces/RepositoryInterface.php';
require_once 'App/Repositories/Interfaces/WeatherRepositoryInterface.php';
require_once 'App/Repositories/Common/Repository.php';
require_once 'App/Repositories/CityRepository.php';
require_once 'App/Repositories/WeatherRepository.php';

// Services.
require_once 'App/Services/HttpService.php';
