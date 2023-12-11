<?php
if(!isset($_SESSION)){
    session_start();
}
include('../includes/header.php');
include('../includes/navbar.php');
require('../model/codeDAO.php');
$codeDAO = new codeDAO;
?>

<?php 
if(isset($_POST['cpf']) || isset($_POST['senha'])){
    if(strlen($_POST['cpf']) == 0){
        $_SESSION['messageerror'] = "Preencha seu CPF.";
    } else if(strlen($_POST['senha']) == 0){
        $_SESSION['messageerror'] = "Preencha sua senha.";
    } else {
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];

        $login = $codeDAO->login($_POST['cpf'],$_POST['senha']);
    }
}
?>

<div class="py-5">    
    <div class="container">   
        <div class="row justify-content-center">
            <div class="col-md-5">
            <?php include('../controller/message.php'); ?>
            <?php include('../controller/messageerror.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label>CPF</label>
                                <input type="text" name="cpf" placeholder="Insira seu CPF (somente números)" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Senha</label>
                                <input type="password" name="senha" placeholder="Insira sua Senha" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-dark">Acessar</button>
                            </div>
                        </form>
                        <p class="mb-0 mt-0">*Logins para teste:</p>
                        <p class="mb-0 mt-0">Admin - CPF: 22222222222 / Senha: 1234</p>                        
                        <p class="mb-0 mt-0">Comum - CPF: 33333333333 / Senha: 123456</p>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('../includes/footer.php');
?>