<?php
session_start();
include('../includes/header.php');
include('../includes/navbar.php');
require '../controller/conexao.php';
require '../controller/protect.php';
?>

<div class="container mt-5">
    <?php include('../controller/message.php'); ?>
    <?php include('../controller/messageerror.php'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="table-responsive">    
                    <div class="card-header">
                        <h4>Empresas
                        <?php
                        if($_SESSION['acesso'] == 1){
                        ?>
                        <a href="cadastro_e.php" class="btn btn-dark float-end">Adicionar Empresa</a>
                        <?php
                        }
                        ?> 
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="" class="mb-3">
                            <input name="busca" style="width: 30%;" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Nome, Nome Fantasia, CNPJ ou Responsável" type="text" autofocus>
                            <button type="submit" >Pesquisar</button>
                        </form>

                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                <th>ID</th>
                                    <th>CNPJ</th>
                                    <th>Nome</th>
                                    <th>Nome Fantasia</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th>Responsável</th>
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
                                    $query = "SELECT * FROM empresa ORDER BY e_id";
                                    $query_run = mysqli_query($mysqli, $query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $dados){
                                            ?>
                                            <tr>
                                            <td><?php echo $dados['e_id']; ?></td>
                                            <td><?php echo $dados['cnpj']; ?></td>
                                            <td><?php echo $dados['nome']; ?></td>
                                            <td><?php echo $dados['nome_fantasia']; ?></td>
                                            <td><?php echo $dados['endereco']; ?></td>
                                            <td><?php echo $dados['telefone']; ?></td>
                                            <td><?php echo $dados['responsavel']; ?></td>
                                            <?php
                                                if($_SESSION['acesso'] == 1){
                                            ?>
                                            <td style="text-align: center;">
                                                <a href="editar_e.php?id=<?= $dados['e_id']; ?>" class="btn btn-dark btn-sm col-lg-12 mb-1">Editar</a>
                                                <form action="../controller/code.php" method="post" class="d-inline" onSubmit="return confirm('Você realmente quer excluir essa empresa?');">
                                                <button type="submit" name="excluir_empresa" value="<?= $dados['e_id']; ?>" class="btn btn-danger btn-sm col-lg-12">Excluir</button>
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
                                    $codeDAO = new codeDAO;
                                    $resultado = $codeDAO->visualizarEmpresas();

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
                                        <td><?php echo $dados['e_id']; ?></td>
                                            <td><?php echo $dados['cnpj']; ?></td>
                                            <td><?php echo $dados['nome']; ?></td>
                                            <td><?php echo $dados['nome_fantasia']; ?></td>
                                            <td><?php echo $dados['endereco']; ?></td>
                                            <td><?php echo $dados['telefone']; ?></td>
                                            <td><?php echo $dados['responsavel']; ?></td>
                                            <?php
                                                if($_SESSION['acesso'] == 1){
                                            ?>
                                            <td style="text-align: center;">
                                                <a href="editar_e.php?id=<?= $dados['e_id']; ?>" class="btn btn-dark btn-sm col-lg-12 mb-1">Editar</a>
                                                <form action="../controller/code.php" method="post" class="d-inline" onSubmit="return confirm('Você realmente quer excluir essa empresa?');">
                                                <button type="submit" name="excluir_empresa" value="<?= $dados['e_id']; ?>" class="btn btn-danger btn-sm col-lg-12">Excluir</button>
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
include('../includes/footer.php');
?>