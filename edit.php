<?php
session_start();

if (!empty($_GET['nome'])) {
    include_once('config.php');

    $nome = $_GET['nome'];

    
    $sqlSelect = "SELECT * FROM usuario WHERE nome='$nome'";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = $result->fetch_assoc()) {
            $nome = $user_data["nome"];
            $sobrenome = $user_data["sobrenome"];
            $email = $user_data["email"];
            $celular = $user_data["celular"];
            $senha = $user_data["senha"];
            $confirmesenha = $user_data["confirmesenha"];
            $genero = $user_data["genero"];
        }
    } else {
        header('Location: sistema.php');
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Cadastro de Instrutores</title>
</head>
<style>
    body {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #0c0ce94d;
        margin: 0;
    }

    .container {
        width: 80%;
        height: auto;
        display: flex;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .form-image {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fde3a7d7;
        padding: 1rem;
    }

    .form-image img {
        width: 100%;
        max-width: 500px;
    }

    .form {
        width: 50%;
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .form-header {
        margin-bottom: 2rem;
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .login-button button {
        border: none;
        background-color: #6c63ff;
        padding: 0.6rem 1.5rem;
        border-radius: 5px;
        cursor: pointer;
        color: white;
    }

    .login-button button:hover {
        background-color: #5a56df;
    }

    .form-header h1 {
        margin: 0;
        font-size: 1.8rem;
    }

    .input-group {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .input-box {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
        width: 48%;
    }

    .input-box input {
        margin-top: 0.5rem;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 0.9rem;
    }

    .input-box input:focus {
        outline: 1px solid #6c63ff;
    }

    .gender-inputs {
        width: 100%;
        margin-top: 1rem;
    }

    .gender-title h6 {
        font-size: 0.85rem;
        margin-bottom: 0.5rem;
    }

    .gender-group {
        display: flex;
        justify-content: space-between;
    }

    .gender-input {
        display: flex;
        align-items: center;
    }

    .gender-input input {
        margin-right: 0.5rem;
    }

    .update {
        width: 100%;
        margin-top: 2rem;
    }

    .update button {
        width: 100%;
        padding: 0.75rem;
        border: none;
        background-color: #6c63ff;
        color: white;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
    }

    .update button:hover {
        background-color: #5a56df;
    }

    @media screen and (max-width: 1330px) {
        .form-image {
            display: none;
        }

        .container {
            width: 100%;
            height: auto;
        }

        .form {
            width: 100%;
        }
    }
</style>
</style>
<body>
    <a href="sistema.php">Voltar</a>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/undraw_stability_ball_b-4-ia.svg" alt="Imagem">
        </div>
        <div class="form">
        
            <form action="saveedit.php" method="POST">
                <div class="form-header">
                    <h1>Cadastro de Instrutores | Sintonia Pilates</h1>
                    <div class="login-button">
                        <button type="button"><a href="http://localhost/cadastro_instrutores/tela-de-login.php" target ="_blank"color: white; text-decoration: none;">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
    <div class="input-box">
        <label for="firstname">Primeiro Nome:</label>
        <input id="nome" type="text" name="nome" value="<?php echo $nome ?>" placeholder="Digite seu primeiro nome" required>
    </div>

    <div class="input-box">
        <label for="lastname">Sobrenome:</label>
        <input id="sobrenome" type="text" name="sobrenome" value="<?php echo $sobrenome ?>" placeholder="Digite seu sobrenome" required>
    </div>

    <div class="input-box">
        <label for="email">E-mail:</label>
        <input id="email" type="email" name="email" value="<?php echo $email ?>" placeholder="Digite seu e-mail" required>
    </div>

    <div class="input-box">
        <label for="number">Celular:</label>
        <input id="celular" type="tel" name="celular" value="<?php echo $celular ?>" placeholder="(xx) xxxx-xxxx" required>
    </div>

    <div class="input-box">
        <label for="password">Senha:</label>
        <input id="senha" type="password" name="senha" value="<?php echo $senha ?>" placeholder="Digite sua senha" required>
    </div>

    <div class="input-box">
        <label for="confirmPassword">Confirme sua Senha:</label>
        <input id="confirmesenha" type="password" name="confirmesenha" value="<?php echo $confirmesenha ?>" placeholder="Digite sua senha novamente" required>
    </div>
</div>

<div class="gender-inputs">
    <div class="gender-title">
        <h6>Gênero</h6>
    </div>

    <div class="gender-group">
        <div class="gender-input">
            <input id="female" type="radio" name="genero" value="feminino" <?php echo $genero == 'Feminino' ? 'checked' : '' ?> required>
            <label for="female">Feminino</label>
        </div>

        <div class="gender-input">
            <input id="male" type="radio" name="genero" value="masculino" <?php echo $genero == 'Masculino' ? 'checked' : '' ?> required>
            <label for="male">Masculino</label>
        </div>

        <div class="gender-input">
            <input id="others" type="radio" name="genero" value="outros" <?php echo $genero == 'Outros' ? 'checked' : '' ?> required>
            <label for="others">Outros</label>
        </div>

        <div class="gender-input">
            <input id="none" type="radio" name="genero" value="prefiro não dizer" <?php echo $genero == 'Prefiro não dizer' ? 'checked' : '' ?> required>
            <label for="none">Prefiro não dizer</label>
        </div>
    </div>
</div>

<div class="Update">
    <button type="submit" name="update" id="update">Salvar</button>
</div>
