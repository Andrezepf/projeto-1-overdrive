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
                    <h4>Editar usuário
                        <a href="./tabela_up.php" class="btn btn-danger float-end">Voltar</a>   
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_GET['id'])){
                        $usuario_id = $_GET['id'];
                        $dados = $codeDAO->localizarUsuario($usuario_id);
                        ?>                            
                        <form action="../controller/code.php" method="post">
                            <input type="hidden" name="usuario_id" value="<?= $dados['u_id']; ?>">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?=$dados['nome']; ?>" class="form-control" required minlength="5" maxlength="255">
                            </div>
                            <div class="mb-3">
                                <label>CPF</label>
                                <input type="text" name="cpf" value="<?=$dados['cpf']; ?>" class="form-control" required minlength="14" maxlength="14" onkeyup="maskcpf(event)">
                            </div>
                            <div class="mb-3">
                                <label>CNH</label>
                                <input type="text" name="cnh" value="<?=$dados['cnh']; ?>" class="form-control" required minlength="10" maxlength="11" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="tel" name="telefone" value="<?=$dados['telefone']; ?>" class="form-control" required minlength="10" maxlength="15" onkeyup="maskphone(event)">
                            </div>
                            <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" value="<?=$dados['endereco']; ?>" class="form-control" required minlength="5" maxlength="255">
                            </div>
                            <div class="mb-3">
                                <label>Carro</label>
                                <input type="text" name="carro" value="<?=$dados['carro']; ?>" class="form-control" required minlength="2" maxlength="255">
                            </div>                            
                            <div class="mb-3">
                                <label>Empresa</label>
                                <select name="empresa" id="empresa" class="form-select" required>                                    
                                    <?php                                       
                                    $resultado = $codeDAO->selectEmpresa(); 
                                    echo "<option value='{$dados['empresa']}'>Manter mesma empresa</option>";                              
                                    foreach($resultado as $dadosEmp){                                        
                                        echo "<option value='{$dadosEmp['e_id']}'>{$dadosEmp['nome_fantasia']}</option>";                                       
                                    }                                        
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Nível de Acesso</label> <br>
                                <input type="radio" name="acesso" id="acesso0" value="0" <?php if($dados['acesso'] == 0){ ?> checked <?php } ?>>
                                <label for="acesso0">Comum</label>
                                <input type="radio" name="acesso" id="acesso1" value="1" <?php if($dados['acesso'] == 1){ ?> checked <?php } ?>>
                                <label for="acesso1">Administrador</label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edita_u" class="btn btn-dark">Salvar mudanças</button>
                                <a href="editar_s.php?id=<?= $dados['u_id']; ?>" class="btn btn-danger float-end">Alterar senha</a>
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