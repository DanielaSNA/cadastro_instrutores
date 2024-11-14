<?php
   session_start(); // Iniciar a sessão

   if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
       include_once('config.php');
       $email = $_POST['email'];
       $senha = $_POST['senha'];

       // Consulta SQL para verificar as credenciais
       $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
       $result = $conexao->query($sql);

       if ($result->num_rows < 1) {
           // Login falhou: Redireciona de volta para a tela de login
           unset($_SESSION['email']);
           unset($_SESSION['senha']);
           header('Location: tela-de-login.php');
       } else {
           // Login bem-sucedido: Define as variáveis de sessão e redireciona para o sistema
           $_SESSION['email'] = $email;
           $_SESSION['senha'] = $senha;
           header('Location: sistema.php');
           exit(); // Boa prática encerrar o script após o redirecionamento
       }
   } else {
       // Redireciona para tela de login se os campos não estiverem preenchidos
       header('Location: tela-de-login.php');
       exit();
   }
?>
