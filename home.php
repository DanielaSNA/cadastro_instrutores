<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=S, initial-scale=1.0">
    <title>Sintonia Pilates</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: whitesmoke;
            text-align: center;
            color: orange;
        }
        .container{
            width: 80%;
            height:auto;
            display: flex;
            margin: 0 auto; 
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }
        form-image {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('assets/img/undraw_stability_ball_b-4-ia.svg'); /* Substitua pelo caminho da sua imagem */
            background-size: cover; /* Faz a imagem cobrir todo o contêiner */
            background-position: center; /* Centraliza a imagem */
            background-repeat: no-repeat; /* Evita repetição da imagem */
            background-color: #fde3a7d7; /* Cor de fundo, caso a imagem não cubra todo o espaço */
            padding: 1rem;
        }
        .box{
            position: absolute;
            top: 20px; /* Define a distância do topo */
            right: 20px; /* Define a distância da direita */
            background-color: rgba(0, 0, 0, 0);
            padding: 30px;
            border-radius: 30px;
        }

        a{
            text-decoration: none;
            color: dodgerblue;
            border:3px orange;
            border-radius: 10px;
            padding: 10 px;
        }
        a:hover{
            background-color: dodgerblue;
        }
        </style>
</head>
<body>
    <h1> Seja bem vindo ao Sintonia Pilates!</h1>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/undraw_stability_ball_b-4-ia.svg" alt="Imagem">
        </div>
    </div>
    <div class="box">
        <a href="http://localhost/trabalho_de_conclusao/tela-de-login.php">Login</a>
        <a href="http://localhost/cadastro_instrutores/index.php">Cadastre-se</a>
    </div>
        
</body>
</html>