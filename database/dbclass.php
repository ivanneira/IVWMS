<?php

require_once "db.inc.php";

class mysql {

    private $host = DATABASE_HOST;
    private $uid = DATABASE_USER;
    private $pwd = DATABASE_PASS;
    private $database = DATABASE_NAME;
    private $conn;

    //constructor que conecta al instanciar objeto
    public function __construct(){

        return $this->connect();
    }

    //conexión a base de datos
    private function connect(){

        try{

            $this->conn = new PDO(
                'mysql:host='.$this->host.';dbname='.$this->database,
                $this->uid,
                $this->pwd
            );


            return true;

        }catch(PDOException $e){

            var_dump($e);

            return false;
        }
    }

    //ejecuta querys simples, devuelve array
    public function query($querystring){

        $sentence = $this->conn->prepare($querystring);
        $sentence->execute();

        $data = array();
        $i = 0;

        while ($row = $sentence->fetch(PDO::FETCH_OBJ)) {
            $data[$i] = $row;
            $i++;
        }

        return $data;
    }

    //ejecuta querys simples y las devuelve como json
    public function json_query($querystring){

        return json_encode( $this->query($querystring));
    }

    //ejecuta store procedures con parámetros opcionales, devuelve un array
    public function runSP($SPname, $SPparams=false){

        $stringSentence = 'exec '.$SPname;

        if(gettype($SPparams) == 'array' ){

            foreach ($SPparams as $param){

                $stringSentence = $stringSentence.' ?,';
            }

            $stringSentence = rtrim($stringSentence, ",");

            $sentence = $this->conn->prepare($stringSentence);

            for($i = 0; $i < count($SPparams); $i++){

                $sentence->bindParam($i+1, $SPparams[$i]);
            }

        }else{

            $sentence = $this->conn->prepare($stringSentence);
        }

        $sentence->execute();

        $data = array();

        $i = 0;

        while ($row = $sentence->fetch(PDO::FETCH_ASSOC)) {
            //array_push($data,$row);
            $data[$i] = $row;
            $i++;
        }

        return $data;

    }

    //ejecuta store procedures con parámetros opcionales, devuelve un json
    public function json_runSP($SPname, $SPparams){

        return json_encode($this->runSP($SPname,$SPparams));
    }
}