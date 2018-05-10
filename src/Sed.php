<?php

namespace SedData;

/**
 * Class Sed
 * @package SedData
 */

use SedData\Repository\SchoolsRepository;

/**
 * Class Sed
 * @package SedData
 */
class Sed
{
    /**
     * @var Http
     */
    protected $http;

    /**
     * @var SchoolsRepository
     */
    public $schools;

    /**
     * Sed constructor.
     * @param string $user
     * @param string $password
     * @throws \Exception
     */
    public function __construct(string $user, string $password)
    {
        $this->http = new Http();

        $credentials = [
            'usuario' => $user,
            'senha' => $password
        ];

        $this->login($credentials);

        $this->loadRepositories();
    }

    /**
     *
     */
    public function __destruct()
    {
        $this->logout();
    }

    /**
     * @param array $credentials
     * @throws \Exception
     */
    protected function login(array $credentials)
    {
        $response = $this->http->post('Logon/LogOn', $credentials);

        if ((string)$response->getBody() == '{"retorno":"invalido"}') {
            throw new \Exception('Credenciais inválidas');
        }

        // Seleciona o perfil de secretaria
        $this->http->post('Inicio/AlterarPerfil', ['id' => 1234]);
    }

    /**
     *
     */
    protected function logout()
    {
        $this->http->get('Logon/LogOff');
    }

    /**
     *
     */
    protected function loadRepositories()
    {
        $this->schools = new SchoolsRepository($this->http);
    }
}