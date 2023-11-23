<?php
session_start();
include('./includes/header.php');
include('./includes/navbar.php');
require './conexao.php';
require 'protectadm.php';
?>


<div class="container mt-5">
    <?php include('./message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar usuário
                        <a href="./tabela_up.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="./code.php" method="post">

                        <div class="mb-3">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" required minlength="5" maxlength="50" placeholder="Insira Nome">
                        </div>
                        <div class="mb-3">
                            <label>CPF</label>
                            <input type="text" name="cpf" class="form-control" required minlength="11" maxlength="11" placeholder="Insira CPF (somente números)">
                        </div>
                        <div class="mb-3">
                            <label>CNH</label>
                            <input type="text" name="cnh" class="form-control" required maxlength="20" placeholder="Insira o número da CNH">
                        </div>
                        <div class="mb-3">
                            <label>Telefone</label>
                            <input type="text" name="telefone" class="form-control" required minlength="9" maxlength="15" placeholder="Insira Telefone">
                        </div>
                        <div class="mb-3">
                            <label>Endereço</label>
                            <input type="text" name="endereco" class="form-control" required minlength="5" maxlength="50" placeholder="Insira Endereço">
                        </div>
                        <div class="mb-3">
                            <label>Carro</label>
                            <input type="text" name="carro" class="form-control" required minlength="2" maxlength="20" placeholder="Insira o modelo do Carro">
                        </div>
                        <div class="mb-3">
                            <label>Empresa</label>
                            <input type="text" name="empresa" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="cadastra_u" class="btn btn-primary">Cadastrar usuário</button>
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