<?php
include('./includes/header.php');
include('./includes/navbar.php');
include('./conexao.php');
?>

<?php 

if(isset($_POST['cpf']) || isset($_POST['senha'])){
    if(strlen($_POST['cpf']) == 0){
        $_SESSION['message'] = "Preencha seu CPF.";
    } else if(strlen($_POST['senha']) == 0){
        $_SESSION['message'] = "Preencha sua senha.";
    } else {

        $cpf = $mysqli->real_escape_string($_POST['cpf']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE cpf = '$cpf'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
            if(password_verify($senha, $usuario['senha'])){
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['u_id'] = $usuario['u_id'];
                $_SESSION['acesso'] = $usuario['acesso'];

                header("Location: index.php");
            } else {
                $_SESSION['message'] = "Falha ao logar! CPF ou senha incorretos!";
            }
        } else {
            $_SESSION['message'] = "Falha ao logar! CPF ou senha incorretos!";
        }

    }
}

?>

<div class="py-5">    
    <div class="container">   
        <div class="row justify-content-center">
            <div class="col-md-5">
            <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label>CPF</label>
                                <input type="text" name="cpf" placeholder="Insira seu CPF (somente números)" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Senha</label>
                                <input type="password" name="senha" placeholder="Insira sua Senha" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-dark">Acessar</button>
                            </div>
                        </form>
                        <p class="mb-0 mt-0">*Logins para teste:</p>
                        <p class="mb-0 mt-0">Admin - CPF: 22222222222 / Senha: 1234</p>                        
                        <p class="mb-0 mt-0">Comum - CPF: 33333333333 / Senha: 123456</p>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
?>