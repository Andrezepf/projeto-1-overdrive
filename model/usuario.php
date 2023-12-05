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




    public function getNome(){
        return $this->nome;
    }

   
    public function setNome($nome){
        $this->nome = $nome;

        return $this;
    }

    
    public function getCpf(){
        return $this->cpf;
    }

 
    public function setCpf($cpf){
        $this->cpf = $cpf;

        return $this;
    }


    public function getCnh(){
        return $this->cnh;
    }


    public function setCnh($cnh){
        $this->cnh = $cnh;

        return $this;
    }


    public function getTelefone(){
        return $this->telefone;
    }

 
    public function setTelefone($telefone){
        $this->telefone = $telefone;

        return $this;
    }


    public function getEndereco(){
        return $this->endereco;
    }


    public function setEndereco($endereco){
        $this->endereco = $endereco;

        return $this;
    }


    public function getCarro(){
        return $this->carro;
    }


    public function setCarro($carro){
        $this->carro = $carro;

        return $this;
    }


    public function getEmpresa(){
        return $this->empresa;
    }


    public function setEmpresa($empresa){
        $this->empresa = $empresa;

        return $this;
    }


    public function getSenha(){
        return $this->senha;
    }


    public function setSenha($senha){
        $this->senha = $senha;

        return $this;
    }


    public function getAcesso(){
        return $this->acesso;
    }

 
    public function setAcesso($acesso){
        $this->acesso = $acesso;

        return $this;
    }
}


?>