<?php

require_once("pessoa.php");
class Aluno extends Pessoa{

    protected $ra;

    public function __construct($ra, $nome, $idade){
        $this->ra = $ra;
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function get_ra(){
        return $this->ra;
    }

}



?>