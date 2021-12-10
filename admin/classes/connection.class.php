<?php

class Connection {
    private $host = "localhost";
    private $user = "xerxes54";
    private $pass = "alicia33";
    private $dbName = "mydb";

    public function connect(){
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        $options = array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $pdo = new PDO($dsn,$this->user,$this->pass,$options);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
    }
}
?>