<?php

   // print_r($_REQUEST);
   if(isset($_POST['submit'])&&!empty($_POST['senha']))
   {
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

       // print_r('Email: ' . $email);

       // print_r('Senha: '. $senha);

       $sql = "SELECT * FROM usuario WHERE email ='$email' and senha = '$senha'";

       $result =$conexao->query($sql);

       //print_r($result);
       if(mysqli_num_rows($result)<1)
       {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location:tela-de-login.php');
       }
        else
        {
            $_SESSION['email'];
            $_SESSION['senha'];
            header('Location:sistema.php');
        }
   }
   else
   {
        header('Location:tela-de-login.php');
   }

?>