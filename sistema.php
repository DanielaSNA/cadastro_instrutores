<?php
    session_start();
    print_r($_SESSION);
    if((!isset($_SESSION['email'])== true) and (!isset($_SESSION['senha']) ==true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location:tela-de-login.php');
    }
    $logado = $_SESSION['email'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SINTONIA PILATES</title>
    <style>
        body{
            color:orangered;
            text-align:center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SINTONIA PILATES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="'navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
         </div>
         <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php
        echo"<h1>Bem vindo <u>$logado</u></h1>";
    ?>
    
</body>
</html>