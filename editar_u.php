<?php
session_start();
include('./includes/header.php');
include('./includes/navbar.php');
require './conexao.php';
require 'protectadm.php';
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mb-5">
        <?php include('./message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Editar usuário
                        <a href="./tabela_up.php" class="btn btn-danger float-end">Voltar</a>
                        
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['id'])){
                        $usuario_id = mysqli_real_escape_string($mysqli, $_GET['id']);
                        $query = "SELECT * FROM usuario WHERE u_id='$usuario_id'";
                        $query_run = mysqli_query($mysqli, $query);

                        if(mysqli_num_rows($query_run) > 0){
                            $dados = mysqli_fetch_array($query_run);
                            ?>
                            
                            <form action="./code.php" method="post">
                                <input type="hidden" name="usuario_id" value="<?= $dados['u_id']; ?>">

                                <div class="mb-3">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="<?=$dados['nome']; ?>" class="form-control" required minlength="5" maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label>CPF</label>
                                    <input type="text" name="cpf" value="<?=$dados['cpf']; ?>" class="form-control" required minlength="11" maxlength="11">
                                </div>
                                <div class="mb-3">
                                    <label>CNH</label>
                                    <input type="text" name="cnh" value="<?=$dados['cnh']; ?>" class="form-control" required minlength="10" maxlength="11">
                                </div>
                                <div class="mb-3">
                                    <label>Telefone</label>
                                    <input type="text" name="telefone" value="<?=$dados['telefone']; ?>" class="form-control" required minlength="10" maxlength="15">
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
                                        $query2 = "SELECT * FROM empresa";
                                        $query_run2 = mysqli_query($mysqli, $query2);
                                        echo "<option value='{$dados['empresa']}'>Manter mesma empresa</option>";
                                        if(mysqli_num_rows($query_run2) > 0){
                                            foreach($query_run2 as $dados2){                                        
                                                echo "<option value='{$dados2['e_id']}'>{$dados2['nome_fantasia']}</option>";                                       
                                            }
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