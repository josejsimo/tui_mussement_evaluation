<?php

/**
 * PHP version 7.4
 *
 * @category Run
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

require_once 'includes.php';

use App\Controllers\WeatherController;

$weatherController = new WeatherController();

$citiesWeather = $weatherController->getWeather(2);

if (($citiesWeather->error === 0) === false) {
    echo 'Error '.$citiesWeather->data."\n";
} else {
    foreach ($citiesWeather->data as $cityWeather) {
        echo 'Processed city '.$cityWeather->city.' | ';

        for ($i = 0; $i < count($cityWeather->weather); $i++) {
            if ($i === (count($cityWeather->weather) - 1)) {
                echo $cityWeather->weather[$i]->condition;
            } else {
                echo $cityWeather->weather[$i]->condition.' - ';
            }
        }

        echo "\n";
    }
}
