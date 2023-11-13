<?php
session_start();
include('./conexao.php');


if(isset($_POST['cadastra_u'])){
    
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
    $cnh = mysqli_real_escape_string($mysqli, $_POST['cnh']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
    $carro = mysqli_real_escape_string($mysqli, $_POST['carro']);
    $empresa = mysqli_real_escape_string($mysqli, $_POST['empresa']);

    $query = "INSERT INTO usuario (nome, cpf, cnh, telefone, endereco, carro, empresa) VALUES ('$nome', '$cpf', '$cnh', '$telefone', '$endereco', '$carro', '$empresa')";

    
    $query_run = mysqli_query($mysqli, $query);
    if($query_run){
        $_SESSION['message'] = "Usuário cadastrado com sucesso!";
        header("Location: cadastro_u.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Usuário NÃO foi cadastrado!";
        header("Location: cadastro_u.php");
        exit(0);
    }
    
}




?>