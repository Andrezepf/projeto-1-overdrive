<?php
include('./includes/header.php');
include('./includes/navbar.php');
require 'conexao.php';
//require 'protect.php';
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                    <?php
                        if(!isset($_SESSION['acesso'])){        
                    ?>
                            <h1>Bem vindo!</h1>
                            <p>Esta é uma aplicação desenvolvida por André Melo Zepf durante o programa de estágio da Overdrive + Sol Agora e busca exemplificar os conhecimentos adquiridos durante essa primeira etapa. Espero que goste ;)</p>
                    <?php
                        } else {
                    ?>
                            <h3>Olá, <?php echo $_SESSION['nome'];?></h3>
                                    
                            </div>
                            <div class="card-body">
                                <p>Com o nível de acesso que você possui é possível:</p>
                                <ul>
                                    <li>Alterar sua senha</li>
                                    <li>Visualizar a lista de Funcionários</li>
                                    <li>Visualizar a lista de Empresas</li>
                                    <?php
                                        if($_SESSION['acesso'] == 1){
                                    ?>
                                    <li>Editar, Excluir e Atualizar Funcionários</li>
                                    <li>Editar, Excluir e Atualizar Empresas</li>
                                    
                                    <?php } ?>
                                    <p><a href="editar_sl.php" class="btn btn-danger float-end">Alterar sua senha</a></p>   
                        <?php } ?>
                                    
                        </ul>
                        
                         
                    </div>
                    
                </div>
                      
            </div>
                                
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
?>