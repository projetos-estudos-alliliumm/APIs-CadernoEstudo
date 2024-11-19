<?php

//MySQL
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Request-With');
header('Content-Type: application/json; charset=utf-8');

const DBDRIVE = 'mysql';
const DBHOST = 'localhost';
const DBNAME = 'adminbd';
const DBUSER = 'alessandra';
const DBPASS = 'ABCabc@123';

try {
    $connPdo = new PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

} catch (Exception $e) {
    echo 'Erro ao conectar com o banco!! '. $e;
}






?>