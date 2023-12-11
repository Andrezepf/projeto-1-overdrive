<?php
session_start();
include('../includes/header.php');
include('../includes/navbar.php');
require('../model/codeDAO.php');
require '../controller/protectadm.php';
$codeDAO = new codeDAO;
?>

<div class="container mt-5">   
    <div class="row justify-content-center">
        <div class="col-md-7 mb-5">
        <?php include('../controller/message.php'); ?>
        <?php include('../controller/messageerror.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar empresa
                        <a href="./tabela_ep.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="../controller/code.php" method="post">

                        <div class="mb-3">
                            <label>CNPJ</label>
                            <input type="text" name="cnpj" class="form-control" required minlength="18" maxlength="18" placeholder="Insira CNPJ (somente números)" onkeyup="maskcnpj(event)">
                        </div>
                        <div class="mb-3">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" required minlength="5" maxlength="255" placeholder="Insira o Nome da Empresa">
                        </div>
                        <div class="mb-3">
                            <label>Nome Fantasia</label>
                            <input type="text" name="nome_fantasia" class="form-control" required minlength="5" maxlength="255" placeholder="Insira o Nome Fantasia da Empresa">
                        </div>
                        <div class="mb-3">
                            <label>Endereço</label>
                            <input type="text" name="endereco" class="form-control" required minlength="5" maxlength="255" placeholder="Insira o Endereço da Empresa">
                        </div>
                        <div class="mb-3">
                            <label>Telefone</label>
                            <input type="text" name="telefone" class="form-control" required minlength="9" maxlength="15" placeholder="Insira o Telefone da Empresa" onkeyup="handlePhone(event)">
                        </div>
                        <div class="mb-3">
                            <label>Responsável</label>
                            <input type="text" name="responsavel" class="form-control" required minlength="5" maxlength="255" placeholder="Insira o Responsável da Empresa">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="cadastra_e" class="btn btn-dark">Cadastrar empresa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('../includes/footer.php');
?>