<?php
session_start();
include('./includes/header.php');
include('./includes/navbar.php');
require 'conexao.php';
require 'protect.php';
?>

<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">   
        <div class="col-md-12 mb-5">            
            <div class="card">
                <div class="table-responsive">
                    <div class="card-header">
                        <h4>Lista de Funcionários
                        <?php
                            if($_SESSION['acesso'] == 1){
                        ?>
                        <a href="cadastro_u.php" class="btn btn-primary float-end">Adicionar Funcionário</a>
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
                        <table class="table table-bordered table-striped">                           
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>CNH</th>
                                    <th>Telefone</th>
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
                                if(!isset($_GET['busca'])){
                                    $query = "SELECT u.u_id, u.nome, u.cpf, u.cnh, u.telefone, u.endereco, u.carro, e.nome_fantasia as empresa from usuario as u join empresa as e on u.empresa = e.e_id ORDER BY u.u_id"; 
                                    
                                    $query_run = mysqli_query($mysqli, $query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $dados){
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
                                                <a href="editar_u.php?id=<?= $dados['u_id']; ?>" class="btn btn-success btn-sm col-lg-12 mb-1">Editar</a>
                                                <form action="code.php" method="post" class="d-inline" onSubmit="return confirm('Você realmente quer excluir esse funcionário?');">
                                                    <button type="submit" name="excluir_usuario" value="<?= $dados['u_id']; ?>" class="btn btn-danger btn-sm col-lg-12">Excluir</button>
                                                </form>
                                            </td>
                                            <?php
                                                }
                                            ?>
                                            </tr>

                                            <?php
                                        }


                                    } else {
                                        echo "<h5>Sem registros</h5>";
                                    }
                                } else{
                                    $pesquisa = $mysqli->real_escape_string($_GET['busca']);
                                    $query = "SELECT u.u_id, u.nome, u.cpf, u.cnh, u.telefone, u.endereco, u.carro, e.nome_fantasia as empresa from usuario as u join empresa as e on u.empresa = e.e_id WHERE u.cpf LIKE '%$pesquisa%' OR u.nome LIKE '%$pesquisa%' ORDER BY u.u_id";
                                    $query_run = mysqli_query($mysqli, $query) or die("ERRO ao consultar! " . $mysqli->error);

                                    if($query_run->num_rows == 0){
                                ?>
                                <tr>
                                    <td colspan="9">Nenhum resultado encontrado...</td>
                                </tr>
                                <?php 
                                }  else {
                                    while($dados = $query_run->fetch_assoc()){
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
                                                <a href="editar_u.php?id=<?= $dados['u_id']; ?>" class="btn btn-success btn-sm col-lg-12 mb-1">Editar</a>
                                                <form action="code.php" method="post" class="d-inline" onSubmit="return confirm('Você realmente quer excluir esse funcionário?');">
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
include('./includes/footer.php');
?>