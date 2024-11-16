<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: tela-de-login.php');
    exit();
}

$logado = $_SESSION['email'];

include_once('config.php');

$sql = "SELECT * FROM usuario ORDER BY nome DESC";
$result = $conexao->query($sql);

if (!$result) {
    die("Erro ao executar a consulta: " . $conexao->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sintonia Pilates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .navbar {
            width: 100%;
            background-color: #343a40;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .table-container {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 2.5rem;
            color: #444;
        }
    </style>
</head>
<body>
    <!-- Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sintonia Pilates</a>
            <div class="d-flex">
                <a href="sair.php" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </nav>

    <!-- Mensagem de boas-vindas -->
    <div class="container text-center mt-4">
        <h1>Bem-vindo, <u><?php echo htmlspecialchars($logado); ?></u>!</h1>
    </div>

    <!-- Tabela -->
    <div class="table-container container mt-4">
        <table class="table table-striped table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Confirme Senha</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($user_data['nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data['sobrenome']) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data['celular']) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data['senha']) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data['confirmesenha']) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data['genero']) . "</td>";
                        echo "<td>
                                <a class='btn btn-sm btn-primary' href='edit.php?nome=" . htmlspecialchars($user_data['nome']) . "'>Editar</a>
                                <a class='btn btn-sm btn-danger' href='remove.php?nome=" . htmlspecialchars($user_data['nome']) . "'>Deletar</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Nenhum registro encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
