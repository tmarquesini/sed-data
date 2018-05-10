<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 10/05/18
 * Time: 15:28
 */

namespace SedData\Repository;


use SedData\Http;

/**
 * Class BaseRepository
 * @package SedData\Repository
 */
class BaseRepository
{
    /**
     * @var Http
     */
    protected $http;

    /**
     * BaseRepository constructor.
     * @param Http $http
     */
    public function __construct(Http $http)
    {
        $this->http = $http;
    }
}