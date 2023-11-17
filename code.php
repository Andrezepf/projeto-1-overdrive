<?php
session_start();
require 'conexao.php';


if(isset($_POST['excluir_usuario'])){
    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['excluir_usuario']);

    $query = "DELETE FROM usuario WHERE u_id='$usuario_id'";
    $query_run = mysqli_query($mysqli, $query);

    if($query_run){
        $_SESSION['message'] = "Usuário excluido com sucesso!";
        header("Location: tabela_up.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Usuário NÃO foi excluido!";
        header("Location: tabela_up.php");
        exit(0);
    }
}

if(isset($_POST['excluir_empresa'])){
    $empresa_id = mysqli_real_escape_string($mysqli, $_POST['excluir_empresa']);

    $query = "DELETE FROM empresa WHERE e_id='$empresa_id'";
    $query_run = mysqli_query($mysqli, $query);

    if($query_run){
        $_SESSION['message'] = "Empresa excluida com sucesso!";
        header("Location: tabela_ep.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Empresa NÃO foi excluida!";
        header("Location: tabela_ep.php");
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
        header("Location: tabela_up.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Usuário NÃO foi atualizado!";
        header("Location: tabela_up.php");
        exit(0);
    }
}



if(isset($_POST['edita_e'])){
    $empresa_id = mysqli_real_escape_string($mysqli, $_POST['empresa_id']);
    $cnpj = mysqli_real_escape_string($mysqli, $_POST['cnpj']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $nome_fantasia = mysqli_real_escape_string($mysqli, $_POST['nome_fantasia']);
    $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $responsavel = mysqli_real_escape_string($mysqli, $_POST['responsavel']);

    $query = "UPDATE empresa SET cnpj='$cnpj', nome='$nome', nome_fantasia='$nome_fantasia', endereco='$endereco', telefone='$telefone', responsavel='$responsavel' WHERE e_id='$empresa_id'";

    $query_run = mysqli_query($mysqli, $query);

    if($query_run){
        $_SESSION['message'] = "Empresa atualizada com sucesso!";
        header("Location: tabela_ep.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Empresa NÃO foi atualizada!";
        header("Location: tabela_ep.php");
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


if(isset($_POST['cadastra_e'])){
    
    $cnpj = mysqli_real_escape_string($mysqli, $_POST['cnpj']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $nome_fantasia = mysqli_real_escape_string($mysqli, $_POST['nome_fantasia']);
    $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $responsavel = mysqli_real_escape_string($mysqli, $_POST['responsavel']);

    $query = "INSERT INTO empresa (cnpj, nome, nome_fantasia, endereco, telefone, responsavel) VALUES ('$cnpj', '$nome', '$nome_fantasia', '$endereco', '$telefone', '$responsavel')";

    
    $query_run = mysqli_query($mysqli, $query);
    if($query_run){
        $_SESSION['message'] = "Empresa cadastrada com sucesso!";
        header("Location: cadastro_e.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Empresa NÃO foi cadastrada!";
        header("Location: cadastro_e.php");
        exit(0);
    }
    
}




?>