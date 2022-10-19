#!/usr/bin/env php
<?php

require 'vendor/autoload.php';




use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

function exibeMensagem (string $mensagem)
{
    echo $mensagem . PHP_EOL;
}

$httpClient = new \GuzzleHttp\Client([
    'base_uri' => 'https://www.alura.com.br/',
    'verify' => false
]);
$crawler = new Crawler();

$buscador = new Buscador($httpClient, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    exibeMensagem($curso);
}