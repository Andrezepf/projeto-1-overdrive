<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Aluno</title>
</head>
<body>

    <h1>Dados do Aluno</h1>
    <?php
        session_start();
        echo "<p> RA: {$_SESSION['ra']}</p>";
        echo "<p> Nome: {$_SESSION['nome']}</p>";
        echo "<p> Idade: {$_SESSION['idade']}</p>";
        
    ?>



    <a href="cadastroAluno.html">Cadastrar Novo </a>
    <a href="consultaAluno.html">Buscar </a>





</body>
</html>