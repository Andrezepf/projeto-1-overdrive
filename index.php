<?php
include('./includes/header.php');
include('./includes/navbar.php');
require 'conexao.php';
require 'protect.php';
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php include('message.php'); ?>       
                <h1>Bem vindo, <?php echo $_SESSION['nome'];?></h1>
                <a href="editar_sl.php" class="btn btn-danger float-end">Alterar senha</a>
            </div>                    
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
?>