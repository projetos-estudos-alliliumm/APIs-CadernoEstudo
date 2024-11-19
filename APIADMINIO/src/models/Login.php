<?php

namespace src\models;

use PDO;

include_once('config.php');


class Login{
    
    public static function loginget(){//receber o id do usuário
       //é estático por isso se coloca o "self", se não era "this"

        $connPdo = new PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS); //CONEXÃO COM O BANCO DE DADOS
        $postjson = json_decode(file_get_contents('php://input'), true);


        $senha_cond =  $postjson['senha'];

        $passCrypt = password_hash($senha_cond, PASSWORD_BCRYPT, ['cost' => 20]);



        if (password_verify($senha_cond, $passCrypt)){
            echo 'Senha igual da Criptografada!';
            $result = json_encode(array('success' => true, 'consultpagesenha' => true));
            echo $result;
        }else{
            echo 'Senha incorreta!';
            $result = json_encode(array('success' => false));
        }
        

        if($result['consultpagesenha']){
            static $table = 'sindicos';//tabela estática por banco de dados
            
            $sql = "SELECT * FROM '.self::$table.'email_sin = '$postjson[email]' and senha_sin = '$passCrypt'";
            $sql = $connPdo->prepare($sql);
            $sql -> execute();
            $res = $sql->fetch(PDO::FETCH_ASSOC);

            for ($i = 0; $i < count($res); $i++){
                foreach ($res[$i] as $key => $value){
                }
                $dados = array(
                    'sindico_id' => $res[$i]['sindico_id'],
                    'nome_sin' => $res[$i] ['nome_sin']
                );
            }

            if(count($res)>0){
                $result = json_encode(array('success'=>true, ));
            }


        }else{
            throw new \Exception("Nenhum usuário encontrado!");
        }
    
    }
}








?>




