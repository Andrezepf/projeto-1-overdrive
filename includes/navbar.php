<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <img src="./images/logo-dark-peq2.png" alt="Logo Overdrive">
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
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php
        }
        if(isset($_SESSION['nome'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./tabela_up.php">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./tabela_ep.php">Empresas</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="./logout.php">Logout</a>
          </li>
          <?php
      }
      ?>

      </ul>
      
    </div>
  </div>
</nav>