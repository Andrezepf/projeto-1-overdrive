<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'aula09');

require_once("aluno.php");
class AlunoDAO{

    private $banco;

    public function __construct(){
        $this->banco = new PDO('mysql:host='.HOST.'; dbname='.DB_NAME,USER,PASSWORD);
    }

    public function gravar_aluno($aluno){

        $gravar = $this->banco->prepare("insert into aluno (ra, nome, idade) values (?,?,?)");
        $novo_aluno = array($aluno->get_ra(), $aluno->get_nome(), $aluno->get_idade());

        if($gravar->execute($novo_aluno))
           return true;
        
        return false;
    }

    public function consultar_aluno_ra($ra){
        $consulta = $this->banco->prepare("select * from aluno where ra=?;");
        $consulta->execute(array($ra));
        $linha = $consulta->fetchAll(PDO::FETCH_OBJ);


        foreach($linha as $a){
            $aluno = new Aluno($a->ra, $a->nome,$a->idade);
        }
      /** $aluno = new Aluno($linha[0]->ra, $linha[0]->nome, $linha[0]->idade); */ 

        return $aluno;
        
    }

    public function consultar_todos_alunos(){
        $consulta = $this->banco->prepare("select * from aluno ");
        $consulta->execute();
        $linha = $consulta->fetchALL(PDO::FETCH_OBJ);

        $lista = array();
        foreach($linha as $a){
            $aluno = new Aluno($a->ra, $a->nome,$a->idade);
            $lista[] = $aluno;
        }

        return $lista;

    }



    public function atualizar_aluno($aluno){
        $ra = $aluno->get_ra();
        $nome = $aluno->get_nome();
        $idade = $aluno->get_idade();

        $atualizar_aluno = array($nome,$idade,$ra);
        $update = $this->banco->prepare("update aluno set nome=?, idade=? where ra=?");

        if($update->execute($atualizar_aluno))
           return true;
        

        return false;
    }

    public function excluir_aluno($ra){
        
        $excluir_aluno = array($ra);
        $delete = $this->banco->prepare("delete from aluno where ra=?");
       
        if($delete->execute($excluir_aluno))
          return true;
       
        return false;
    }   

    





}



?>