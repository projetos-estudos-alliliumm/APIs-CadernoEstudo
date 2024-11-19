<?php


$senha = '123';

$passCrypt = password_hash($senha, PASSWORD_BCRYPT, ['cost' => 20]);

if (password_verify($senha, $passCrypt)){
    echo 'logado';
}else{
    echo 'Senha incorreta!';
}

echo $passCrypt



?>