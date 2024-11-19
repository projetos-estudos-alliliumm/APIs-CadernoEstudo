<?php

namespace src\services;

use src\models\User;

class UserService{
    public function get($id = null){
        //pegar dados usuário
        if($id){
            return User::select($id);
            //se existir um id na barra de busca, vai buscar 1 id expecifico
        }else{
            return User::selectAll();
        }

    }

    public function post(){
        //inserir usuario

    }

    public function update(){
        //alterar usuario

    }
    
    public function delete(){
        //deletar usuario

    }


}




?>