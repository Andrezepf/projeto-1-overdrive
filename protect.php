<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['nome'])){
    die("Você não pode acessar está página poque não está logado");
    ?>
    <a href="login.php"></a>
    <?php
}
?>