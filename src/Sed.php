<?php

namespace SedData;

/**
 * Class Application
 * @package SedData
 */
class Application
{
    /**
     * @var Http
     */
    private $http;

    /**
     * Application constructor.
     * @param string $user
     * @param string $password
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __construct(string $user, string $password)
    {
        $this->http = new Http('https://sed.educacao.sp.gov.br/');

        $this->login($user, $password);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __destruct()
    {
        $this->logout();
    }

    /**
     * @param string $url
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $url)
    {
        return $this->http->get($url);
    }

    /**
     * @param string $url
     * @param array $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $url, array $data)
    {
        return $this->http->post($url, ['form_params' => $data]);
    }

    /**
     * @param string $user
     * @param string $password
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function login(string $user, string $password)
    {
        $credentials = [
            'senha' => $password,
            'usuario' => $user,
        ];

        $response = $this->post('Logon/LogOn', $credentials);
die($response->getBody());
        $this->post('Inicio/AlterarPerfil', ['id' => '1234']);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function logout()
    {
        $this->get('Logon/LogOff');
    }
}