<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME','exemplo');

require_once("aluno.php");

class AlunoDAO{

    private $banco;

    public function __construct(){
        $this->banco = new PDO('mysql:host='.HOST.'; dbname='.DB_NAME,USER,PASSWORD);
    }

    //gravar aluno no banco
    public function gravar_aluno($aluno){

        $gravar = $this->banco->prepare("insert into aluno (ra, nome, idade) values (?,?,?)");       
        
        $novo_aluno = array($aluno->get_ra(), $aluno->get_nome(), $aluno->get_idade());
       
        // insert into aluno (ra, nome, idade) values (1, "Nakir", 34);
        if($gravar->execute($novo_aluno)){
            return true;
        }

        return false;       
    }

    //consultar aluno
    public function consultar_aluno_ra($ra){

        $consulta = $this->banco->prepare("select * from aluno where ra = ?;");
        $ra_aluno = array($ra);

        $consulta->execute($ra_aluno);
        $linha = $consulta->fetchAll(PDO::FETCH_OBJ);


        foreach($linha as $a){
            $aluno = new Aluno($a->ra, $a->nome, $a->idade);
        }
       

        return $aluno;  

    }




    //atualizar_aluno
    public function atualiza_aluno($aluno){
        $update = $this->banco->prepare("UPDATE aluno SET nome = ?, idade = ? WHERE ra = ?");
        $update_run = array($aluno->get_nome(), $aluno->get_idade(), $aluno->get_ra());

        $update->execute($update_run);


    }

    //deletar aluno
    public function deleta_aluno($ra){

        
        $array = array($ra);

        $deletar = $this->banco->prepare("DELETE FROM aluno WHERE ra = ?");

        $deletar->execute($array);

    }






}






?>