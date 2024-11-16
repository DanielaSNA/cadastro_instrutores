<?php
    include_once("config.php");
    
    if(isset($_POST['update']))
    {
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];
        $senha = $_POST["senha"];
        $confirmesenha = $_POST["confirmesenha"];
        $genero = $_POST["genero"];

        $sqlUpdate = "UPDATE usuario SET nome='$nome', sobrenome = '$sobrenome', email='$email', celular='$celular', senha='$senha', confirmesenha='$confirmesenha', genero='$genero'
        WHERE nome ='$nome'";

        $result =$conexao ->query($sqlUpdate);
    }
    header('Location: sistema.php')

 ?>