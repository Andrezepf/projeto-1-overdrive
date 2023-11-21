<?php
session_start();
include('./includes/header.php');
include('./includes/navbar.php');
require './conexao.php';
require 'protect.php';
?>


<div class="container mt-5">
    <?php include('./message.php'); ?>
    <div class="row">
        <div class="col-md-12">
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
                            
                            <form action="./code.php" method="post">
                                <input type="hidden" name="empresa_id" value="<?= $dados['e_id']; ?>">

                                <div class="mb-3">
                                <div class="mb-3">
                                    <label>CNPJ</label>
                                    <input type="text" name="cnpj" value="<?=$dados['cnpj']; ?>" class="form-control">
                                </div>
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="<?=$dados['nome']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Nome Fantasia</label>
                                    <input type="text" name="nome_fantasia" value="<?=$dados['nome_fantasia']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Endereço</label>
                                    <input type="text" name="endereco" value="<?=$dados['endereco']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Telefone</label>
                                    <input type="text" name="telefone" value="<?=$dados['telefone']; ?>" class="form-control">
                                </div>                                
                                <div class="mb-3">
                                    <label>Responsavel</label>
                                    <input type="text" name="responsavel" value="<?=$dados['responsavel']; ?>" class="form-control">
                                </div>
                                
                                <div class="mb-3">
                                    <button type="submit" name="edita_e" class="btn btn-primary">Salvar mudanças</button>
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