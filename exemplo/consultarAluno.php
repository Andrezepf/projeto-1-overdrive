<?php

require_once("aluno.php");
require_once("alunoDAO.php");

$ra = $_POST["ra"];

$alunoDAO = new AlunoDAO();

$aluno = $alunoDAO->consultar_aluno_ra($ra);


echo $aluno->get_nome();
echo $aluno->get_idade();


?>