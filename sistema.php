<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['email'])== true) and (!isset($_SESSION['senha']) ==true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location:tela-de-login.php');
    }
    $logado = $_SESSION['email'];
    
    $sql = "SELECT * FROM usuario ORDER BY nome DESC";

    $result = $conexao->query($sql);

    //print_r($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SINTONIA PILATES</title>
    <style>
        body{
            color:black;
            text-align:center;
        }
        .table-bg{
            background: rgba(0,0,0,0.5);
            border-radius: 15px,15px,15px,15px;
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

    <div class "me-5">
        <table class="table text-black table-bg">
            <thead>
                 <tr>
                    
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Confirme Senha</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">...</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['sobrenome']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['celular']."</td>";
                        echo "<td>".$user_data['senha']."</td>";
                        echo "<td>".$user_data['confirmesenha']."</td>";
                        echo "<td>".$user_data['genero']."</td>";
                        echo "<td>ações</td>";
                        echo "</tr>";

                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>