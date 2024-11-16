<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sintonia Pilates</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(120deg, #f6d365, #fda085);
            text-align: center;
            color: #444;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 30px;
        }
        .container {
            width: 80%;
            max-width: 900px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            border-radius: 15px;
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
            max-width: 400px;
        }
        .box {
            width: 50%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .box a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: dodgerblue;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            margin: 10px 0;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }
        .box a:hover {
            background-color: #1e90ff;
        }
    </style>
</head>
<body>
    <h1>Seja bem-vindo ao Sintonia Pilates!</h1>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/undraw_stability_ball_b-4-ia.svg" alt="Imagem">
        </div>
        <div class="box">
            <a href="http://localhost/cadastro_instrutores/tela-de-login.php">Login</a>
            <a href="http://localhost/cadastro_instrutores/index.php">Cadastre-se</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
