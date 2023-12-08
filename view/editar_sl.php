<?php
session_start();
include('../includes/header.php');
include('../includes/navbar.php');
require('../model/codeDAO.php');
require '../controller/conexao.php';
require '../controller/protect.php';
$codeDAO = new codeDAO;
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
        <?php include('../controller/message.php'); ?>
        <?php include('../controller/messageerror.php'); ?>
            <div class="card">
                <div class="card-header">
                <?php
                    if(isset($_SESSION['u_id'])){
                        $usuario_id = $_SESSION['u_id'];
                        $dados = $codeDAO->localizarUsuario($usuario_id);
                            ?>
                            <h4>Alterar senha
                            <a href="../index.php" class="btn btn-danger float-end">Voltar</a>        
                            </h4>
                        </div>
                        <div class="card-body">

                    
                            
                            <form action="../controller/code.php" method="post">
                                <input type="hidden" name="usuario_id" value="<?= $dados['u_id']; ?>">

                                <div class="mb-3">
                                    <label>Nova senha</label>
                                    <input type="password" name="nova_senha" placeholder="Digite a nova senha" class="form-control" required minlength="4" maxlength="30">
                                </div>
                                <div class="mb-3">
                                    <label>Confirme a nova senha</label>
                                    <input type="password" name="confirma_senha" placeholder="Digite novamente a nova senha" class="form-control" required minlength="4" maxlength="30">
                               
                                <div class="mb-3">
                                    <button type="submit" name="edita_sl" class="btn btn-dark mt-3">Alterar senha</button>
                                    
                                </div>
                            </form>
                            <?php
                        
                    }
                    ?>          
                            
                </div>
            </div>
        </div>
    </div>
</div>












<?php
include('../includes/footer.php');
?>