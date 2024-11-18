<?php
    session_start();
    include_once('config.php');

    // Verifica se o parâmetro 'nome' foi enviado
    if (empty($_GET['nome'])) {
        header('Location: sistema.php');
        exit;
    }

    $nome = $_GET['nome'];

    // Uso de prepared statement para evitar SQL injection
    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome = ?");
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $result = $stmt->get_result();

    // Inicializa variáveis
    $nome = $sobrenome = $email = $celular = $senha = $confirmesenha = $genero = '';

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $nome = $user_data['nome'];
        $sobrenome = $user_data['sobrenome'];
        $email = $user_data['email'];
        $celular = $user_data['celular'];
        $senha = $user_data['senha'];
        $confirmesenha = $user_data['confirmesenha'];
        $genero = $user_data['genero'];
    } else {
        header('Location: sistema.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Instrutores</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            font-family: Arial, Helvetica, sans-serif;
            color: #444;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .form-image {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fde3a7d7;
            padding: 1rem;
        }

        .form-image img {
            width: 100%;
            max-width: 400px;
        }

        .form {
            width: 50%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            padding: 10px;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #6c63ff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #5a56df;
        }

        .gender-group {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .gender-group .form-check {
            margin-right: 10px;
            margin-bottom: 10px;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .form-image {
                width: 100%;
            }

            .form {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <a href="sistema.php" class="btn btn-light mb-3">Voltar</a>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/undraw_stability_ball_b-4-ia.svg" alt="Imagem">
        </div>
        <div class="form">
            <br>
            <h1> Editar </h1>
        <div class="form">
            <br>
            <br>
            <h1>Editar  </h1>
            <form action="saveedit.php" method="POST">
                
                    <label for="nome"> Nome          </label>
                    <input type="text" id="nome" name="nome" class="form-control" value="<?php echo  $nome; ?>" required>
                </div>
                <div class="form-group">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" id="sobrenome" name="sobrenome" class="form-control" value="<?php echo $sobrenome; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="tel" id="celular" name="celular" class="form-control" value="<?php echo $celular; ?>" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="text" id="senha" name="senha" class="form-control" value="<?php echo $senha; ?>" required>
                </div>
                <div class="form-group">
                    <label for="confirmesenha">Confirme sua Senha</label>
                    <input type="password" id="confirmesenha" name="confirmesenha" class="form-control" value="<?php $confirmesenha; ?>" required>
                </div>
                <div class="form-group">
                    <label>Gênero</label>
                    <div class="gender-group">
                        <div class="form-check">
                            <input type="radio" id="female" name="genero" value="Feminino"<?php echo ($genero == 'feminino' ? 'checked' : '')?> class="form-check-input" required>
                            <label for="female" class="form-check-label">Feminino</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="male" name="genero" value="Masculino" <?php echo ($genero == 'masculino' ? 'checked' : '')?>class="form-check-input" required>
                            <label for="male" class="form-check-label">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="others" name="genero" value="Outros" <?php echo($genero == 'outros' ? 'checked' : '')?> class="form-check-input" required>
                            <label for="others" class="form-check-label">Outros</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="none" name="genero" value="Prefiro não dizer" <?php echo($genero == 'prefiro não dizer' ? 'checked' : '')?> class="form-check-input" required>
                            <label for="none" class="form-check-label">Prefiro não dizer</label>
                        </div>
                    </div>
                <button type="submit" name="update" id ="update" class="btn-submit mt-3">Salvar Alterações</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>