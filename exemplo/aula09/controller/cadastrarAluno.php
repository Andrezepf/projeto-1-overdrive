<?php

require_once("../model/aluno.php");
require_once("../model/alunoDAO.php");

$ra = $_POST["ra"];
$nome = $_POST["nome"];
$idade = $_POST["idade"];

$aluno = new Aluno($ra,$nome,$idade);
$alunoDAO = new AlunoDAO();

if($alunoDAO->gravar_aluno($aluno))
    header("Location: ../view/cadastroRealizado.html");
else
    header("Location: ../view/cadastroProblema.html");

?>