<?php
session_start();
include('../includes/header.php');
include('../includes/navbar.php');
require('../model/codeDAO.php');
require '../controller/conexao.php';
require '../controller/protectadm.php';
?>


<div class="container mt-5">    
    <div class="row justify-content-center">
        <div class="col-md-7 mb-5">
        <?php include('../controller/message.php'); ?>
        <?php include('../controller/messageerror.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar usuário
                        <a href="./tabela_up.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="../controller/code.php" method="post">

                        <div class="mb-3">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" required minlength="5" maxlength="255" placeholder="Insira Nome">
                        </div>
                        <div class="mb-3">
                            <label>CPF</label>
                            <input type="text" name="cpf" class="form-control" required minlength="11" maxlength="11" placeholder="Insira CPF (somente números)">
                        </div>
                        <div class="mb-3">
                            <label>CNH</label>
                            <input type="text" name="cnh" class="form-control" required minlength="10" maxlength="11" placeholder="Insira o número da CNH">
                        </div>
                        <div class="mb-3">
                            <label>Telefone</label>
                            <input type="text" name="telefone" class="form-control" required minlength="9" maxlength="15" placeholder="Insira Telefone">
                        </div>
                        <div class="mb-3">
                            <label>Endereço</label>
                            <input type="text" name="endereco" class="form-control" required minlength="5" maxlength="255" placeholder="Insira Endereço">
                        </div>
                        <div class="mb-3">
                            <label>Carro</label>
                            <input type="text" name="carro" class="form-control" required minlength="2" maxlength="255" placeholder="Insira o modelo do Carro">
                        </div>
                        <div class="mb-3">
                            <label>Senha</label>
                            <input type="password" name="senha" class="form-control" required minlength="4" maxlength="30" placeholder="Insira a senha">
                        </div>
                        <div class="mb-3">
                            <label>Empresa</label>
                            <select name="empresa" id="empresa" class="form-select" required>
                                <option value="">Selecione uma Empresa...</option>
                            <?php
                            $codeDAO = new codeDAO;
                            $resultado = $codeDAO->selectEmpresa();                               
                                foreach($resultado as $dados){                                        
                                    echo "<option value='{$dados['e_id']}'>{$dados['nome_fantasia']}</option>";                                       
                                }                               
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Nível de Acesso</label> <br>
                            <input type="radio" name="acesso" id="acesso0" value="0" checked>
                            <label for="acesso0">Comum</label>
                            <input type="radio" name="acesso" id="acesso1" value="1">
                            <label for="acesso1">Administrador</label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="cadastra_u" class="btn btn-dark">Cadastrar usuário</button>
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