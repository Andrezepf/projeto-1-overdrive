<?php

require_once("../model/aluno.php");
require_once("../model/alunoDAO.php");
/*
$ra = $_POST["ra"];

$alunoDAO = new AlunoDAO();

$aluno = $alunoDAO->consultar_aluno_ra($ra);

if($aluno != null){
    session_start();
    $_SESSION["ra"] = $aluno->get_ra();
    $_SESSION["nome"] = $aluno->get_nome();
    $_SESSION["idade"] = $aluno->get_idade();
    

    header("Location: ../view/exibeAluno.php");
    exit;
}
*/

$alunoDAO = new AlunoDAO();

$lista = $alunoDAO->consultar_todos_alunos();

foreach ($lista as $a){
    echo "Nome: {$a->get_nome()} <br>";
}



?>