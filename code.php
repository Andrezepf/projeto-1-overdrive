<?php
session_start();
include('./conexao.php');


if(isset($_POST['excluir_usuario'])){
    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['excluir_usuario']);

    $query = "DELETE FROM usuario WHERE u_id='$usuario_id'";
    $query_run = mysqli_query($mysqli, $query);

    if($query_run){
        $_SESSION['message'] = "Usuário excluido com sucesso!";
        header("Location: crud.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Usuário NÃO foi excluido!";
        header("Location: crud.php");
        exit(0);
    }
}


if(isset($_POST['edita_u'])){
    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['usuario_id']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
    $cnh = mysqli_real_escape_string($mysqli, $_POST['cnh']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
    $carro = mysqli_real_escape_string($mysqli, $_POST['carro']);
    $empresa = mysqli_real_escape_string($mysqli, $_POST['empresa']);

    $query = "UPDATE usuario SET nome='$nome', cpf='$cpf', cnh='$cnh', telefone='$telefone', endereco='$endereco', carro='$carro', empresa='$empresa' WHERE u_id='$usuario_id'";

    $query_run = mysqli_query($mysqli, $query);

    if($query_run){
        $_SESSION['message'] = "Usuário atualizado com sucesso!";
        header("Location: crud.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Usuário NÃO foi atualizado!";
        header("Location: crud.php");
        exit(0);
    }
}



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