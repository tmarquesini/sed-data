<?php

namespace SedData;

/**
 * Class Sed
 * @package SedData
 */
/**
 * Class Sed
 * @package SedData
 */
class Sed extends Http
{
    /**
     * Sed constructor.
     * @param string $user
     * @param string $password
     * @throws \Exception
     */
    public function __construct(string $user, string $password)
    {
        parent::__construct();

        $credentials = [
            'usuario' => $user,
            'senha' => $password
        ];

        $this->login($credentials);
    }

    /**
     *
     */
    public function __destruct()
    {
        $this->logout();

        parent::__destruct();
    }

    /**
     * @param array $credentials
     * @throws \Exception
     */
    protected function login(array $credentials)
    {
        $response = $this->post('Logon/LogOn', $credentials);

        if ((string) $response->getBody() == '{"retorno":"invalido"}') {
            throw new \Exception('Credenciais inválidas');
        }

        // Seleciona o perfil de secretaria
        $this->post('Inicio/AlterarPerfil', ['id' => 1234]);
    }

    /**
     *
     */
    protected function logout()
    {
        $this->get('Logon/LogOff');
    }
}