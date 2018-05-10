<?php

require __DIR__ . '/vendor/autoload.php';

$http = new GuzzleHttp\Client([
    'base_uri' => 'https://sed.educacao.sp.gov.br/',
    'cookies' => new GuzzleHttp\Cookie\CookieJar()
]);

$credentials = [
    'usuario' => 'rg27694947xsp',
    'senha' => 'd1g0m3d5'
];

$response = $http->post('Logon/LogOn', ['form_params' => $credentials]);

//echo $response->getBody();

//$data = json_decode($response->getBody());
//echo $data->retorno;

$response = $http->post('Inicio/AlterarPerfil', [
    'form_params' => [
        'id' => '1234'
    ]
]);

//echo $response->getBody();

$data = [
    'anoLetivo' => 2018,
    'codigoEscola' => 335617,
    'codigoSerie' => 0,
    'codigoTipoEnsino' => 0,
    'codigoTurma' => 0,
    'numeroClasse' => null,
    'tipoPesquisa' => 1
];

$response = $http->post('NCA/RelacaoAlunosClasse/PesquisaTurma', ['form_params' => $data]);

echo $response->getBody();