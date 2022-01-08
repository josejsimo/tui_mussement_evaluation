<?php

/**
 * PHP version 7.4
 *
 * @category Repository_Class
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;

use Config\AppConfig;
use App\Services\HttpService;
use App\Repositories\Common\Repository;

/**
 * CityRepository
 *
 * @category Class
 * @package  Repositories
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

class CityRepository extends Repository implements RepositoryInterface
{


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->apiUrl = AppConfig::$tuiMussementApi;

    }//end __construct()


    /**
     * Get cities
     *
     * @return Cities object
     * @throws Throwable
     */
    public function get()
    {
        try {
            return json_decode(HttpService::HttpRequest($this->apiUrl));
        } catch (\Throwable $ex) {
            throw $ex;
        }

    }//end get()


}//end class
