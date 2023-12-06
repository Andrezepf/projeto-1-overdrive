<?php
require 'controller/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Overdrive</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <img src="./images/logo-dark-peq.png" alt="Logo Overdrive">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <?php
        if(!isset($_SESSION)){
          session_start();
        }
        if(!isset($_SESSION['nome'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view/login.php">Login</a>
          </li>
        <?php
        }
        if(isset($_SESSION['nome'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view/tabela_up.php">Funcionários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view/tabela_ep.php">Empresas</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="controller/logout.php">Logout</a>
          </li>
          <?php
      }
      ?>
      </ul>      
    </div>
  </div>
</nav>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php include('./controller/message.php'); ?>
                <?php include('./controller/messageerror.php'); ?>
                <div class="card">
                    <div class="card-header">
                    <?php
                        if(!isset($_SESSION['acesso'])){        
                    ?>
                            <h1>Bem vindo(a)!</h1>
                            <p>Esta é uma aplicação desenvolvida por André Zepf durante o programa de estágio da Overdrive + Sol Agora e busca exemplificar os conhecimentos adquiridos durante essa primeira etapa. Espero que goste ;)</p>
                            <p>Você pode começar fazendo o login através do botão abaixo ou na opção "login" no cabeçalho.</p>
                            <a href="view/login.php" class="btn btn-dark btn-lg mt-3 col-lg-12">Login</a>
                    <?php
                        } else {
                    ?>
                            <h3>Olá, <?php echo $_SESSION['nome'];?></h3>
                                    
                            </div>
                            <div class="card-body">
                                <p>Com o nível de acesso que você possui é possível:</p>
                                <ul>
                                    <li>Alterar sua senha</li>
                                    <li>Visualizar a lista de Funcionários</li>
                                    <li>Visualizar a lista de Empresas</li>
                                    <?php
                                        if($_SESSION['acesso'] == 1){
                                    ?>
                                          <li>Editar, Excluir e Atualizar Funcionários</li>
                                          <li>Editar, Excluir e Atualizar Empresas</li>
                                    
                                    <?php } ?>
                                    <p><a href="view/editar_sl.php" class="btn btn-danger float-end mt-2">Alterar sua senha</a></p>   
                        <?php } ?>
                                    
                        </ul>
                        
                         
                    </div>
                    
                </div>
                      
            </div>
                                
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
?>