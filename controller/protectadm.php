<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['nome'])){
    $_SESSION['messageerror'] = "Você não está logado portanto não pode acessar a página solicitada, faça o login abaixo.";
    header("Location: ../view/login.php");
    exit(0);
}

if($_SESSION['acesso'] == 0){
    $_SESSION['messageerror'] = "Você não tem permissão para acessar a página solicitada, faça login como administrador para acessá-la.";
    header("Location: ../index.php");
    exit(0);
} 

?>