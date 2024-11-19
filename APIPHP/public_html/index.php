<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Request-With');
header('Content-Type: application/json; charset=utf-8');//formato json

require_once '/../vendor/autoload.php';

//api/users/1

if ($_GET['url']){
    $url = explode('/',$_GET['url']);//quebrar string e transformar em array

    if($url[0] === 'api'){
        //ele quer usar os dados da api
        array_shift($url);//remover o primeiro registro para que a string user essa 0. utilize var_dump para visualizar o cenário
        
        $service = 'src\services\\'.ucfirst($url[0]).'Service';
        //ucfirt: primeira letra em minusculo

        array_shift($url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);
        //strtolower é para minimizar letras
        //BOA PRÁTICA É UTILIZAR O REQUEST E O RESPONSE


        try{
            $response = call_user_func_array(array(new $service, $method),$url);
            //$service = new UserService, porém tem que declara o namespace
            //Com o a array contendo o service e o método, com mais a url

            http_response_code(200);//inspecionar navegador/network
            echo json_encode(array('status' => 'success', 'data' => $response));
            //converter a array em json, uma string basicamente

        }catch(\Exception $e){
            http_response_code(404);
            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()),JSON_UNESCAPED_UNICODE);
            //JSON_UNESAPED_UNICODE = para consertar os caracteres bugados que o json fez.
        }
    }
}





?>