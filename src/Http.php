<?php

namespace SedData;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

/**
 * Class Http
 * @package SedData
 */
class Http
{
    /**
     * @var resource
     */
    private $http;

    /**
     * Http constructor.
     */
    public function __construct()
    {
        $this->http = new Client([
            'base_uri' => 'https://sed.educacao.sp.gov.br/',
            'cookies' => new CookieJar()
        ]);
    }

    /**
     *
     */
    public function __destruct()
    {
        # code...
    }

    /**
     * @param string $url
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get(string $url)
    {
        return $this->http->get($url);
    }

    /**
     * @param string $url
     * @param array $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post(string $url, array $data)
    {
        return $this->http->post($url, ['form_params' => $data]);
    }
}