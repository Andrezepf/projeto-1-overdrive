<?php
session_start();
include('../includes/header.php');
include('../includes/navbar.php');
require '../controller/conexao.php';
require '../controller/protectadm.php';
?>


<div class="container mt-5">   
    <div class="row justify-content-center">
        <div class="col-md-7 mb-5">
        <?php include('../controller/message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Editar Empresa
                        <a href="./tabela_ep.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['id'])){
                        $empresa_id = mysqli_real_escape_string($mysqli, $_GET['id']);
                        $query = "SELECT * FROM empresa WHERE e_id='$empresa_id'";
                        $query_run = mysqli_query($mysqli, $query);

                        if(mysqli_num_rows($query_run) > 0){
                            $dados = mysqli_fetch_array($query_run);
                            ?>
                            
                            <form action="../controller/code.php" method="post">
                                <input type="hidden" name="empresa_id" value="<?= $dados['e_id']; ?>">

                                <div class="mb-3">
                                <div class="mb-3">
                                    <label>CNPJ</label>
                                    <input type="text" name="cnpj" value="<?=$dados['cnpj']; ?>" class="form-control" required minlength="14" maxlength="14">
                                </div>
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="<?=$dados['nome']; ?>" class="form-control" required minlength="5" maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label>Nome Fantasia</label>
                                    <input type="text" name="nome_fantasia" value="<?=$dados['nome_fantasia']; ?>" class="form-control" required minlength="5" maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label>Endereço</label>
                                    <input type="text" name="endereco" value="<?=$dados['endereco']; ?>" class="form-control" required minlength="5" maxlength="50">
                                </div>
                                <div class="mb-3">
                                    <label>Telefone</label>
                                    <input type="text" name="telefone" value="<?=$dados['telefone']; ?>" class="form-control" required minlength="9" maxlength="255">
                                </div>                                
                                <div class="mb-3">
                                    <label>Responsável</label>
                                    <input type="text" name="responsavel" value="<?=$dados['responsavel']; ?>" class="form-control" required minlength="5" maxlength="255">
                                </div>
                                
                                <div class="mb-3">
                                    <button type="submit" name="edita_e" class="btn btn-dark">Salvar mudanças</button>
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
include('../includes/footer.php');
?>