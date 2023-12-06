<?php
session_start();
require 'conexao.php';
require('../model/codeDAO.php');
require('../model/usuario.php');
require('../model/empresa.php');


if(isset($_POST['excluir_usuario'])){
    
    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['excluir_usuario']);

    
    if($usuario_id == $_SESSION['u_id']){
        $_SESSION['messageerror'] = "Você não pode excluir a si mesmo!";
        header("Location: ../view/tabela_up.php");
    } else {
        $query = "DELETE FROM usuario WHERE u_id='$usuario_id'";
        $query_run = mysqli_query($mysqli, $query);
        if($query_run){
            $_SESSION['message'] = "Usuário excluido com sucesso!";
            header("Location: ../view/tabela_up.php");
            exit(0);
        } else {
            $_SESSION['messageerror'] = "Usuário NÃO foi excluido!";
            header("Location: ../view/tabela_up.php");
            exit(0);
        }
    }
}

if(isset($_POST['excluir_empresa'])){
    $empresa_id = mysqli_real_escape_string($mysqli, $_POST['excluir_empresa']);

    $query = "SELECT * FROM usuario WHERE empresa='$empresa_id'"; 
                                
    $query_run = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($query_run) > 0){
        $_SESSION['messageerror'] = "Empresa NÃO pode ser excluida pois possui funcionários vinculados!";
        header("Location: ../view/tabela_ep.php");
    }else{
        $query = "DELETE FROM empresa WHERE e_id='$empresa_id'";
        $query_run = mysqli_query($mysqli, $query);

        if($query_run){
            $_SESSION['message'] = "Empresa excluida com sucesso!";
            header("Location: ../view/tabela_ep.php");
            exit(0);
        } else {
            $_SESSION['messageerror'] = "Empresa NÃO foi excluida!";
            header("Location: ../view/tabela_ep.php");
            exit(0);
        }
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
    $acesso = mysqli_real_escape_string($mysqli, $_POST['acesso']);

    $codeDAO = new codeDAO; 
    $busca = $codeDAO->infoUsuario($usuario_id);
    $senha = $busca['senha'];

    $usuario = new Usuario($nome,$cpf,$cnh,$telefone,$endereco,$carro,$empresa,$senha,$acesso);


    try{
    
        if($codeDAO->editaUsuario($usuario,$usuario_id)){
            $_SESSION['message'] = "Usuário atualizado com sucesso!";
            header("Location: ../view/tabela_up.php");
            exit(0);
        }else{
            $_SESSION['messageerror'] = "Usuário NÃO foi atualizado!";
            header("Location: ../view/tabela_up.php");
            exit(0);
        }
    
    }
    
    catch(PDOException $e){
        $_SESSION['messageerror'] = "Usuário NÃO foi atualizado!";
        //$_SESSION['messageerror'] = "Erro: " . $e->getMessage();
        header("Location: ../view/tabela_up.php");
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

    $codeDAO = new codeDAO;
    $empresa = new Empresa($cnpj,$nome,$nome_fantasia,$endereco,$telefone,$responsavel);


    try {
    
        if($codeDAO->editaEmpresa($empresa,$empresa_id)){
            $_SESSION['message'] = "Empresa atualizada com sucesso!";
            header("Location: ../view/tabela_ep.php");
            exit(0);
        }else{
            $_SESSION['messageerror'] = "Empresa NÃO foi atualizada!";
            header("Location: ../view/tabela_ep.php");
            exit(0);
        }
    
    } 
    
    catch(PDOException $e){
        $_SESSION['messageerror'] = "Empresa NÃO foi atualizada!";
        //$_SESSION['messageerror'] = "Erro: " . $e->getMessage();
        header("Location: ../view/tabela_ep.php");
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
    $senha = mysqli_real_escape_string($mysqli, password_hash($_POST['senha'], PASSWORD_DEFAULT));
    $acesso = mysqli_real_escape_string($mysqli, $_POST['acesso']);

    $codeDAO = new codeDAO;
    $usuario = new Usuario($nome,$cpf,$cnh,$telefone,$endereco,$carro,$empresa,$senha,$acesso);

    
    try{
        if($codeDAO->cadastraUsuario($usuario)){
            $_SESSION['message'] = "Usuário cadastrado com sucesso!";
            header("Location: ../view/cadastro_u.php");
            exit(0);
        }else{
            $_SESSION['messageerror'] = "Usuário NÃO foi cadastrado!";
            header("Location: ../view/cadastro_u.php");
            exit(0);
        }
    }
    
    catch(PDOException $e){
        $_SESSION['messageerror'] = "Usuário NÃO foi cadastrado!";
        //$_SESSION['messageerror'] = "Erro: " . $e->getMessage();
        header("Location: ../view/cadastro_u.php");
        exit();
    }
    
}


if(isset($_POST['cadastra_e'])){
    
    $cnpj = mysqli_real_escape_string($mysqli, $_POST['cnpj']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $nome_fantasia = mysqli_real_escape_string($mysqli, $_POST['nome_fantasia']);
    $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $responsavel = mysqli_real_escape_string($mysqli, $_POST['responsavel']);

    $codeDAO = new codeDAO;
    $empresa = new Empresa($cnpj,$nome,$nome_fantasia,$endereco,$telefone,$responsavel);


    try{
        if($codeDAO->cadastraEmpresa($empresa)){
            $_SESSION['message'] = "Empresa cadastrada com sucesso!";
            header("Location: ../view/cadastro_e.php");
            exit(0);
        }else{
            $_SESSION['messageerror'] = "Empresa NÃO foi cadastrada!";
            header("Location: ../view/cadastro_e.php");
            exit(0);
        }
    }
    
    catch(PDOException $e){
        $_SESSION['messageerror'] = "Empresa NÃO foi cadastrada!";
        //$_SESSION['messageerror'] = "Erro: " . $e->getMessage();
        header("Location: ../view/cadastro_e.php");
        exit();
    }
    
}

if(isset($_POST['edita_s'])){
    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['usuario_id']);
    $nova_senha = mysqli_real_escape_string($mysqli, $_POST['nova_senha']);
    $confirma_senha = mysqli_real_escape_string($mysqli, $_POST['confirma_senha']);

    $codeDAO = new codeDAO; 
    $busca = $codeDAO->infoUsuario($usuario_id);
    $nome = $busca['nome'];
    $cpf = $busca['cpf'];
    $cnh = $busca['cnh'];
    $telefone = $busca['telefone'];
    $endereco = $busca['endereco'];
    $carro = $busca['carro'];
    $empresa = $busca['empresa'];
    $acesso = $busca['acesso'];

    

    if($nova_senha == $confirma_senha){
        $senha = mysqli_real_escape_string($mysqli, password_hash($_POST['nova_senha'], PASSWORD_DEFAULT));
        $usuario = new Usuario($nome,$cpf,$cnh,$telefone,$endereco,$carro,$empresa,$senha,$acesso);

        try {
    
            if($codeDAO->editaSenha($usuario,$usuario_id)){
                $_SESSION['message'] = "Senha atualizada com sucesso!";
                header("Location: ../view/editar_u.php?id={$usuario_id}");
                exit(0);
            }else{
                $_SESSION['messageerror'] = "A senha NÃO foi atualizada!";
                header("Location: ../view/editar_u.php?id={$usuario_id}");
                exit(0);
            }
        
        } 
        
        catch(PDOException $e){
            $_SESSION['messageerror'] = "A senha NÃO foi atualizada!";
            //$_SESSION['messageerror'] = "Erro: " . $e->getMessage();
            header("Location: ../view/tabela_ep.php");
            exit(0);
        }
  
    } else {
        $_SESSION['messageerror'] = "As senhas não são iguais!";
        header("Location: ../view/editar_s.php?id={$usuario_id}");
        exit(0);
    } 
    
    
    
    

    
}

if(isset($_POST['edita_sl'])){
    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['usuario_id']);
    $nova_senha = mysqli_real_escape_string($mysqli, $_POST['nova_senha']);
    $confirma_senha = mysqli_real_escape_string($mysqli, $_POST['confirma_senha']);

    $codeDAO = new codeDAO; 
    $busca = $codeDAO->infoUsuario($usuario_id);
    $nome = $busca['nome'];
    $cpf = $busca['cpf'];
    $cnh = $busca['cnh'];
    $telefone = $busca['telefone'];
    $endereco = $busca['endereco'];
    $carro = $busca['carro'];
    $empresa = $busca['empresa'];
    $acesso = $busca['acesso'];

    if($usuario_id == $_SESSION['u_id']){
                
        if($nova_senha == $confirma_senha){
            $senha = mysqli_real_escape_string($mysqli, password_hash($_POST['nova_senha'], PASSWORD_DEFAULT));
            $usuario = new Usuario($nome,$cpf,$cnh,$telefone,$endereco,$carro,$empresa,$senha,$acesso);
    
            try {
        
                if($codeDAO->editaSenha($usuario,$usuario_id)){
                    $_SESSION['message'] = "Senha atualizada com sucesso!";
                    header("Location: ../index.php");
                    exit(0);
                }else{
                    $_SESSION['messageerror'] = "A senha NÃO foi atualizada!";
                    header("Location: ../view/editar_sl.php");
                    exit(0);
                }
            
            } 
            
            catch(PDOException $e){
                $_SESSION['messageerror'] = "A senha NÃO foi atualizada!";
                //$_SESSION['messageerror'] = "Erro: " . $e->getMessage();
                header("Location: ../view/editar_sl.php");
                exit(0);
            }
      
        } else {
            $_SESSION['messageerror'] = "As senhas não são iguais!";
            header("Location: ../view/editar_sl.php");
            exit(0);
        }
    } else {
        $_SESSION['messageerror'] = "Impossível atualizar, incompatibilidade de ID";
        header("Location: ../index.php");
        exit(0);
    }
    
    
}



?>