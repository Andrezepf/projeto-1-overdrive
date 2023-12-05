<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME','overdrive');


class codeDAO{
    private $banco;

    public function __construct(){
        $this->banco = new PDO('mysql:host='.HOST.'; dbname='.DB_NAME,USER,PASSWORD);
    }


}

?>