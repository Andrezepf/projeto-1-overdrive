<?php
session_start();
include('../includes/header.php');
include('../includes/navbar.php');
require('../model/codeDAO.php');
require '../controller/protect.php';
$codeDAO = new codeDAO;
?>

<div class="container mt-5">
    <?php include('../controller/message.php'); ?>
    <?php include('../controller/messageerror.php'); ?>
    <div class="row justify-content-center">   
        <div class="col-md-12 mb-5">            
            <div class="card">
                <div class="table-responsive">
                    <div class="card-header">
                        <h4>Funcionários
                        <?php
                            if($_SESSION['acesso'] == 1){
                        ?>
                        <a href="cadastro_u.php" class="btn btn-dark float-end">Adicionar Funcionário</a>
                        <?php
                            }
                        ?>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" class="mb-3">
                            <input name="busca" style="width: 30%;" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Nome ou CPF" type="text" autofocus>
                            <button type="submit" >Pesquisar</button>
                        </form>
                        <table class="table table-bordered table-hover">                           
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th style="width:130px">CPF</th>
                                    <th>CNH</th>
                                    <th style="width:140px">Telefone</th>
                                    <th>Endereço</th>
                                    <th>Carro</th>
                                    <th>Empresa</th>
                                    <?php
                                    if($_SESSION['acesso'] == 1){
                                    ?>
                                    <th>Ação</th>
                                    <?php
                                        }
                                    ?> 
                                </tr>
                            </thead>                           
                            <tbody>
                                <?php                                        
                                $resultado = $codeDAO->visualizarUsuarios();
                                if ($resultado == null){
                                    ?>
                                    <tr>
                                        <td colspan="9">Nenhum resultado encontrado...</td>
                                    </tr>
                                    <?php
                                } else{

                                foreach($resultado as $dados){
                                ?>
                                    <tr>
                                    <td><?php echo $dados['u_id']; ?></td>
                                    <td><?php echo $dados['nome']; ?></td>
                                    <td><?php echo $dados['cpf']; ?></td>
                                    <td><?php echo $dados['cnh']; ?></td>
                                    <td><?php echo $dados['telefone']; ?></td>
                                    <td><?php echo $dados['endereco']; ?></td>
                                    <td><?php echo $dados['carro']; ?></td>
                                    <td><?php echo $dados['empresa']; ?></td>
                                    <?php
                                        if($_SESSION['acesso'] == 1){
                                    ?>
                                    <td style="text-align: center;">
                                        <a href="editar_u.php?id=<?= $dados['u_id']; ?>" class="btn btn-dark btn-sm col-lg-12 mb-1">Editar</a>
                                        <form action="../controller/code.php" method="post" class="d-inline" onSubmit="return confirm('Você realmente quer excluir esse funcionário?');">
                                            <button type="submit" name="excluir_usuario" value="<?= $dados['u_id']; ?>" class="btn btn-danger btn-sm col-lg-12">Excluir</button>
                                        </form>
                                    </td>
                                    <?php
                                        }
                                    ?>
                                    </tr>
                                <?php
                                }
                            }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('../includes/footer.php');
?>