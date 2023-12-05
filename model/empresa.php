<?php

class Empresa{
    public $id_empresa;
    public $cnpj;
    public $nome;
    public $nome_fantasia;
    public $endereco;
    public $telefone;
    public $responsavel;
    
    public function __construct($cnpj,$nome,$nome_fantasia,$endereco,$telefone,$responsavel)
    {
        $this->cnpj=$cnpj;
        $this->nome=$nome;
        $this->nome_fantasia=$nome_fantasia;
        $this->endereco=$endereco;
        $this->telefone=$telefone;
        $this->responsavel=$responsavel;
    }





}


?>