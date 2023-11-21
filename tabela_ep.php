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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Lista de Empresas
                    <a href="cadastro_e.php" class="btn btn-primary float-end">Adicionar Empresa</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="" class="mb-3">
                        <input name="busca" style="width: 30%;" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Nome, Nome Fantasia, CNPJ ou Responsável" type="text">
                        <button type="submit" >Pesquisar</button>
                    </form>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                                <th>CNPJ</th>
                                <th>Nome</th>
                                <th>Nome Fantasia</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Responsável</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        
                        <tbody>

                            <?php
                            if(!isset($_GET['busca'])){ 
                                $query = "SELECT * FROM empresa";
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
                                        <td>
                                            <a href="editar_e.php?id=<?= $dados['e_id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                            <form action="code.php" method="post" class="d-inline">
                                            <button type="submit" name="excluir_empresa" value="<?= $dados['e_id']; ?>" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </td>
                                        </tr>

                                        <?php
                                    }


                                } else {
                                    echo "<h5>Sem registros</h5>";
                                }
                            } else{
                                $pesquisa = $mysqli->real_escape_string($_GET['busca']);
                                $query = "SELECT * FROM empresa WHERE nome LIKE '%$pesquisa%' OR nome_fantasia LIKE '%$pesquisa%' OR cnpj LIKE '%$pesquisa%' OR responsavel LIKE '%$pesquisa%'";
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
                                    <td><?php echo $dados['e_id']; ?></td>
                                        <td><?php echo $dados['cnpj']; ?></td>
                                        <td><?php echo $dados['nome']; ?></td>
                                        <td><?php echo $dados['nome_fantasia']; ?></td>
                                        <td><?php echo $dados['endereco']; ?></td>
                                        <td><?php echo $dados['telefone']; ?></td>
                                        <td><?php echo $dados['responsavel']; ?></td>
                                        <td>
                                            <a href="editar_e.php?id=<?= $dados['e_id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                            <form action="code.php" method="post" class="d-inline">
                                            <button type="submit" name="excluir_empresa" value="<?= $dados['e_id']; ?>" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </td>
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







<?php
include('./includes/footer.php');
?>