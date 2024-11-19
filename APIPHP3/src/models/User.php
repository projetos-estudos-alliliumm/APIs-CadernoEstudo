<?php

//Namespace possibilita o agrupamento de classes, interfaces, funções e constantes, evitando conflito entre nomes.
//Funcionamento equivalente ao de diretórios em sistemas operacionais.
namespace src\models;

//Models = regras de negócio, interações com o banco de dados

class User{

    private static $table = 'user';//tabela privada e estática por banco de dados

    

    public static function select(int $id){//receber o id do usuário
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS); //CONEXÃO COM O BANCO DE DADOS

        $sql = 'SELECT * FROM '.self::$table.'WHERE id = :id';//é estático por isso se coloca o "self", se não era "this"
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            return $stmt->fetch(\PDO::FECTH_ASSOC); 

            //FETCH_* : CONTROLA COMO SERÁ RETORNADA A LINHA
            //PDO::FECTH_ASSOC: retorna um array indexado pelo nome da coluna conforme retornado em seu conjunto de resultados

        }else{
            throw new \Exception("Nenhum usuário encontrado!");
        }
    
    }

    public static function selectAll(){//receber o id do usuário
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS); //CONEXÃO COM O BANCO DE DADOS

        $sql = 'SELECT * FROM '.self::$table;//é estático por isso se coloca o "self", se não era "this"
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            return $stmt->fetchAll(\PDO::FECTH_ASSOC); 

            //FETCH_* : CONTROLA COMO SERÁ RETORNADA A LINHA
            //PDO::FECTH_ASSOC: retorna um array indexado pelo nome da coluna conforme retornado em seu conjunto de resultados

        }else{
            throw new \Exception("Nenhum usuário encontrado!");
        }
    
    }

    public static function insert($data){
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS); //CONEXÃO COM O BANCO DE DADOS

        $sql = 'INSERT INTO'.self::$table.'(email, password, name) VALUES(:em, :pa, :na)';//é estático por isso se coloca o "self", se não era "this"
        $stmt = $connPdo->prepare($sql);
        $stmt->binValue(':em', $data['email']);
        $stmt->binValue(':pa', $data['password']);
        $stmt->binValue(':na', $data['name']);

        $stmt->execute();

        if ($stmt->rowCount() > 0){
            return 'Usuário(a) inserido com sucesso"'; 

            //FETCH_* : CONTROLA COMO SERÁ RETORNADA A LINHA
            //PDO::FECTH_ASSOC: retorna um array indexado pelo nome da coluna conforme retornado em seu conjunto de resultados

        }else{
            throw new \Exception("Falha ao inserir o usuário!");
        }
    

    }

}

?>