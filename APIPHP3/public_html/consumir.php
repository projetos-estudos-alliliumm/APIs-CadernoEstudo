<?php

$url = 'http://localhost/PROJS/VIDEO_AULAS/SERIE/03_APIREST2021/public_html/api';

$class = '/user';
$param = '';


$response = file_get_content($url.$class.$param);//pegar conteúdo

echo $response;

//
// $response = json_decode($response, 1);//descodificar do json para uma array, acrescentando o numero

// var_dump($response['data'][1]['email']);
