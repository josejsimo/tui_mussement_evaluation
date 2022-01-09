<?php

/**
 * PHP version 7.4
 *
 * @category Config_Class
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

declare(strict_types=1);

namespace Config;

/**
 * AppConfig
 *
 * @category Class
 * @package  Config
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

class AppConfig
{
public static string $tuiMussementApi = 'https://api.musement.com/api/v3/cities.json';
public static string $weatherApi      = 'http://api.weatherapi.com/v1/forecast.json?key=562cd4913eb84c8fa95161910220501';

}

