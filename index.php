<?php
include('./includes/header.php');
include('./includes/navbar.php');
require 'conexao.php';
include('./protect.php');
?>

<div class="py-5">
    <div class="container">
        
                <h1>Bem vindo, <?php echo $_SESSION['nome'];?></h1>
                <p>
                    <a href="logout.php">Sair</a>
                </p>
      
    </div>
</div>

<?php
include('./includes/footer.php');
?>