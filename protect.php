<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['nome'])){
    $_SESSION['message'] = "Você não está logado portanto não pode acessar a página solicitada, faça o login abaixo.";
    header("Location: login.php");
    exit(0);
}
?>