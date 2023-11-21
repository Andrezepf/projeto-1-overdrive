<?php

require_once("aluno.php");
require_once("alunoDAO.php");

//Pegar os valores do formulario
$ra = $_POST["ra"];
$nome = $_POST["nome"];
$idade = $_POST["idade"];

//Criar um objeto de aluno
$aluno = new Aluno($ra, $nome, $idade);

//Criar um objeto de AlunoDAO
$alunoDAO = new AlunoDAO();

//chamar o metodo gravar_aluno de AlunoDAO passando o objeto $aluno como parametro
$alunoDAO->atualiza_aluno($aluno);

?>