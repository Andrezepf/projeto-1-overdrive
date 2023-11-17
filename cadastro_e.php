<?php
session_start();
include('./includes/header.php');
include('./includes/navbar.php');
require './conexao.php';
?>


<div class="container mt-5">

    <?php include('./message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar empresa
                        <a href="./tabela_ep.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="./code.php" method="post">

                        <div class="mb-3">
                            <label>CNPJ</label>
                            <input type="text" name="cnpj" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nome Fantasia</label>
                            <input type="text" name="nome_fantasia" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Endereço</label>
                            <input type="text" name="endereco" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Telefone</label>
                            <input type="text" name="telefone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Responsável</label>
                            <input type="text" name="responsavel" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="cadastra_e" class="btn btn-primary">Cadastrar empresa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>












<?php
include('./includes/footer.php');
?>