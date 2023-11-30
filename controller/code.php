<?php
session_start();
require 'conexao.php';


if(isset($_POST['excluir_usuario'])){
    
    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['excluir_usuario']);

    
    if($usuario_id == $_SESSION['u_id']){
        $_SESSION['message'] = "Você não pode excluir a si mesmo!";
        header("Location: ../view/tabela_up.php");
    } else {
        $query = "DELETE FROM usuario WHERE u_id='$usuario_id'";
        $query_run = mysqli_query($mysqli, $query);
        if($query_run){
            $_SESSION['message'] = "Usuário excluido com sucesso!";
            header("Location: ../view/tabela_up.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Usuário NÃO foi excluido!";
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
        $_SESSION['message'] = "Empresa NÃO pode ser excluida pois possui funcionários vinculados!";
        header("Location: ../view/tabela_ep.php");
    }else{
        $query = "DELETE FROM empresa WHERE e_id='$empresa_id'";
        $query_run = mysqli_query($mysqli, $query);

        if($query_run){
            $_SESSION['message'] = "Empresa excluida com sucesso!";
            header("Location: ../view/tabela_ep.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Empresa NÃO foi excluida!";
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

    $query = "UPDATE usuario SET nome='$nome', cpf='$cpf', cnh='$cnh', telefone='$telefone', endereco='$endereco', carro='$carro', empresa='$empresa', acesso='$acesso' WHERE u_id='$usuario_id'";

    $query_run = mysqli_query($mysqli, $query);

    if($query_run){
        $_SESSION['message'] = "Usuário atualizado com sucesso!";
        header("Location: ../view/tabela_up.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Usuário NÃO foi atualizado!";
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

    $query = "UPDATE empresa SET cnpj='$cnpj', nome='$nome', nome_fantasia='$nome_fantasia', endereco='$endereco', telefone='$telefone', responsavel='$responsavel' WHERE e_id='$empresa_id'";

    $query_run = mysqli_query($mysqli, $query);

    if($query_run){
        $_SESSION['message'] = "Empresa atualizada com sucesso!";
        header("Location: ../view/tabela_ep.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Empresa NÃO foi atualizada!";
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
    $senha = mysqli_real_escape_string($mysqli, password_hash($_POST['senha'], PASSWORD_DEFAULT));
    $empresa = mysqli_real_escape_string($mysqli, $_POST['empresa']);
    $acesso = mysqli_real_escape_string($mysqli, $_POST['acesso']);

    $query = "INSERT INTO usuario (nome, cpf, cnh, telefone, endereco, carro, senha, empresa, acesso) VALUES ('$nome', '$cpf', '$cnh', '$telefone', '$endereco', '$carro', '$senha', '$empresa', '$acesso')";

    
    $query_run = mysqli_query($mysqli, $query);
    if($query_run){
        $_SESSION['message'] = "Usuário cadastrado com sucesso!";
        header("Location: ../view/cadastro_u.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Usuário NÃO foi cadastrado!";
        header("Location: ../view/cadastro_u.php");
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
        header("Location: ../view/cadastro_e.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Empresa NÃO foi cadastrada!";
        header("Location: ../view/cadastro_e.php");
        exit(0);
    }
    
}

if(isset($_POST['edita_s'])){
    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['usuario_id']);
    $nova_senha = mysqli_real_escape_string($mysqli, $_POST['nova_senha']);
    $confirma_senha = mysqli_real_escape_string($mysqli, $_POST['confirma_senha']);
    if($nova_senha == $confirma_senha){
        $senha = mysqli_real_escape_string($mysqli, password_hash($_POST['nova_senha'], PASSWORD_DEFAULT));
        $query = "UPDATE usuario SET senha='$senha' WHERE u_id='$usuario_id'";

        $query_run = mysqli_query($mysqli, $query);

        if($query_run){
            $_SESSION['message'] = "Senha atualizada com sucesso!";
            header("Location: ../view/editar_u.php?id={$usuario_id}");
            exit(0);
        } else {
            $_SESSION['message'] = "A senha NÃO foi atualizada!";
            header("Location: ../view/editar_u.php?id={$usuario_id}");
            exit(0);
        }  
    } else {
        $_SESSION['message'] = "As senhas não são iguais!";
        header("Location: ../view/editar_s.php?id={$usuario_id}");
        exit(0);
    }    
    
    

    
}

if(isset($_POST['edita_sl'])){
    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['usuario_id']);
    $nova_senha = mysqli_real_escape_string($mysqli, $_POST['nova_senha']);
    $confirma_senha = mysqli_real_escape_string($mysqli, $_POST['confirma_senha']);
    if($usuario_id == $_SESSION['u_id']){
        if($nova_senha == $confirma_senha){
            $senha = mysqli_real_escape_string($mysqli, password_hash($_POST['nova_senha'], PASSWORD_DEFAULT));
            $query = "UPDATE usuario SET senha='$senha' WHERE u_id='$usuario_id'";
    
            $query_run = mysqli_query($mysqli, $query);
    
            if($query_run){
                $_SESSION['message'] = "Senha atualizada com sucesso!";
                header("Location: ../index.php");
                exit(0);
            } else {
                $_SESSION['message'] = "A senha NÃO foi atualizada!";
                header("Location: ../view/editar_sl.php");
                exit(0);
            }  
        } else {
            $_SESSION['message'] = "As senhas não são iguais!";
            header("Location: ../view/editar_sl.php");
            exit(0);
        }    
    } else {
        $_SESSION['message'] = "Impossível atualizar, incompatibilidade de ID";
        header("Location: ../index.php");
        exit(0);
    }
    
    
}



?>