<?php

if (isset($_POST['submit'])) {

    include_once('config.php');

    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $senha = $_POST["senha"];
    $confirmesenha = $_POST["confirmesenha"];
    $genero = $_POST["genero"];

    /* Verificar se a conexão foi bem-sucedida (caso a configuração não inclua essa verificação)
    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
        */

    // Inserir os dados na base de dados
    $result = mysqli_query($conexao, "INSERT INTO usuario (nome, sobrenome, email, celular, senha, genero, confirmesenha) 
                                      VALUES ('$nome', '$sobrenome', '$email', '$celular', '$senha', '$genero', '$confirmesenha')");

    /* Verificar se a inserção foi bem-sucedida
    if ($result) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conexao);
    }
        */
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

    .continue-button {
        width: 100%;
        margin-top: 2rem;
    }

    .continue-button button {
        width: 100%;
        padding: 0.75rem;
        border: none;
        background-color: #6c63ff;
        color: white;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
    }

    .continue-button button:hover {
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
    <div class="container">
        <div class="form-image">
            <img src="assets/img/undraw_stability_ball_b-4-ia.svg" alt="Imagem">
        </div>
        <div class="form">
        
            <form action="index.php" method="POST">
                <div class="form-header">
                    <h1>Cadastro de Instrutores | Sintonia Pilates</h1>
                    <div class="login-button">
                        <button type="button"><a href="#" style="color: white; text-decoration: none;">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Primeiro Nome:</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome:</label>
                        <input id="sobrenome" type="text" name="sobrenome" placeholder="Digite seu sobrenome" required>
                    </div>

                    <div class="input-box">
                        <label for="email">E-mail:</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="number">Celular:</label>
                        <input id="celular" type="tel" name="celular" placeholder="(xx) xxxx-xxxx" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha:</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box">
                        <label for="confirmPassword">Confirme sua Senha:</label>
                        <input id="confirmesenha" type="password" name="confirmesenha" placeholder="Digite sua senha novamente" required>
                    </div>
                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="female" type="radio" name="genero" value="Feminino">
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input id="male" type="radio" name="genero" value="Masculino">
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input id="others" type="radio" name="genero" value="Outros">
                            <label for="others">Outros</label>
                        </div>

                        <div class="gender-input">
                            <input id="none" type="radio" name="genero" value="Prefiro não dizer">
                            <label for="none">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit" name="submit">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
