<?php

abstract class Pessoa{
    protected $nome;
    protected $idade;

    public function get_nome(){
        return $this->nome;
    }

    public function get_idade(){
        return $this->idade;
    }
}

?>