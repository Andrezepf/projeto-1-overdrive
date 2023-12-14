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
                    <h4>Editar Empresa
                        <a href="./tabela_ep.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_GET['id'])){
                        $empresa_id = $_GET['id'];
                        $dados = $codeDAO->localizarEmpresa($empresa_id);
                        ?>                           
                        <form action="../controller/code.php" method="post">
                            <input type="hidden" name="empresa_id" value="<?= $dados['e_id']; ?>">
                            <div class="mb-3">
                                <label>CNPJ</label>
                                <input type="text" name="cnpj" value="<?=$dados['cnpj']; ?>" class="form-control" required minlength="18" maxlength="18" onkeyup="maskcnpj(event)">
                            </div>
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?=$dados['nome']; ?>" class="form-control" required minlength="5" maxlength="255">
                            </div>
                            <div class="mb-3">
                                <label>Nome Fantasia</label>
                                <input type="text" name="nome_fantasia" value="<?=$dados['nome_fantasia']; ?>" class="form-control" required minlength="5" maxlength="255">
                            </div>
                            <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" value="<?=$dados['endereco']; ?>" class="form-control" required minlength="5" maxlength="255">
                            </div>
                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="text" name="telefone" value="<?=$dados['telefone']; ?>" class="form-control" required minlength="9" maxlength="15" onkeyup="handlePhone(event)">
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