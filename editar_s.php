<?php
session_start();
include('./includes/header.php');
include('./includes/navbar.php');
require './conexao.php';
require 'protectadm.php';
?>


<div class="container mt-5">

    

    <div class="row justify-content-center">
        <div class="col-md-5">
        <?php include('./message.php'); ?>
            <div class="card">
                <div class="card-header">
                <?php
                    if(isset($_GET['id'])){
                        $usuario_id = mysqli_real_escape_string($mysqli, $_GET['id']);
                        $query = "SELECT * FROM usuario WHERE u_id='$usuario_id'";
                        $query_run = mysqli_query($mysqli, $query);

                        if(mysqli_num_rows($query_run) > 0){
                            $dados = mysqli_fetch_array($query_run);
                            ?>
                    <h4>Alterar senha
                    <a href="editar_u.php?id=<?= $usuario_id; ?>" class="btn btn-danger float-end">Voltar</a>        
                    </h4>
                </div>
                <div class="card-body">

                    
                            
                            <form action="./code.php" method="post">
                                <input type="hidden" name="usuario_id" value="<?= $dados['u_id']; ?>">

                                <div class="mb-3">
                                    <label>Nova senha</label>
                                    <input type="password" name="nova_senha" placeholder="Digite a nova senha" class="form-control" required minlength="4" maxlength="30">
                                </div>
                                <div class="mb-3">
                                    <label>Confirme a nova senha</label>
                                    <input type="password" name="confirma_senha" placeholder="Digite novamente a nova senha" class="form-control" required minlength="4" maxlength="30">
                               
                                <div class="mb-3">
                                    <button type="submit" name="edita_s" class="btn btn-dark mt-3">Alterar senha</button>
                                    
                                </div>
                            </form>
                            <?php
                        } else {
                            echo "<h4>ID não encontrado.</h4>";
                        }
                    }
                    ?>          
                            
                </div>
            </div>
        </div>
    </div>
</div>












<?php
include('./includes/footer.php');
?>