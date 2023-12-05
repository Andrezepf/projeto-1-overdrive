<?php


class Usuario{
    public $u_id;
    public $nome;
    public $cpf;
    public $cnh;
    public $telefone;
    public $endereco;
    public $carro;
    public $empresa;
    public $senha;
    public $acesso;
    

    public function __construct($nome,$cpf,$cnh,$telefone,$endereco,$carro,$empresa,$senha,$acesso)
    {
        $this->nome=$nome;
        $this->cpf=$cpf;
        $this->cnh=$cnh;
        $this->telefone=$telefone;
        $this->endereco=$endereco;
        $this->carro=$carro;
        $this->empresa=$empresa;
        $this->senha=$senha;
        $this->acesso=$acesso;
    }




}


?>