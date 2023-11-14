<?php
include('./includes/header.php');
include('./includes/navbar.php');
require 'conexao.php';
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div id="boxlista" class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de funcionários</h4>
                    </div>
                    <div  class="card-body">

                    
                        <form action="">
                            <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Nome, CPF ou Empresa" type="text">
                            <button type="submit">Pesquisar</button>
                        </form>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>CNH</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Carro</th>
                                <th>Empresa</th>
                            </tr>
                            <?php 
                            if(!isset($_GET['busca'])){
                            ?>
                            <tr>
                            <?php 
                            $sql_code = "SELECT * FROM usuario";
                            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error);
                            while($dados = $sql_query->fetch_assoc()){
                                ?>
                                    <tr>
                                        <td><?php echo $dados['nome']; ?></td>
                                        <td><?php echo $dados['cpf']; ?></td>
                                        <td><?php echo $dados['cnh']; ?></td>
                                        <td><?php echo $dados['telefone']; ?></td>
                                        <td><?php echo $dados['endereco']; ?></td>
                                        <td><?php echo $dados['carro']; ?></td>
                                        <td><?php echo $dados['empresa']; ?></td>
                                    </tr>
                                    <?php   
                                }
                                ?>
                            </tr>
                            <?php
                            } else{
                                $pesquisa = $mysqli->real_escape_string($_GET['busca']);
                                $sql_code = "SELECT * FROM usuario WHERE cpf LIKE '%$pesquisa%' OR nome LIKE '%$pesquisa%' OR empresa LIKE '%$pesquisa%'";
                                $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error);

                                if($sql_query->num_rows == 0){
                            ?>
                            <tr>
                                <td colspan="3">Nenhum resultado encontrado...</td>
                            </tr>
                            <?php 
                            }  else {
                                while($dados = $sql_query->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?php echo $dados['nome']; ?></td>
                                        <td><?php echo $dados['cpf']; ?></td>
                                        <td><?php echo $dados['cnh']; ?></td>
                                        <td><?php echo $dados['telefone']; ?></td>
                                        <td><?php echo $dados['endereco']; ?></td>
                                        <td><?php echo $dados['carro']; ?></td>
                                        <td><?php echo $dados['empresa']; ?></td>
                                    </tr>
                                <?php 
                                }
                            }
                                
                            ?>



                            <?php
                            }
                            ?>
                        </table>


                        <?php



                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
?>