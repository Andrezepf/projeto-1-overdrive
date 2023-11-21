<?php

require_once("aluno.php");
require_once("alunoDAO.php");

$ra = $_POST["ra"];

$alunoDAO = new AlunoDAO();

$aluno = $alunoDAO->deleta_aluno($ra);

?>