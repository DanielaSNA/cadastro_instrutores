<?php
session_start();

if (!empty($_GET['nome'])) {
    include_once('config.php');

    // Sanitiza o nome recebido via GET para evitar SQL Injection
    $nome = mysqli_real_escape_string($conexao, $_GET['nome']);

    // Verifica se o usuário existe
    $sqlSelect = "SELECT * FROM usuario WHERE nome='$nome'";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        // Executa a exclusão
        $sqlDelete = "DELETE FROM usuario WHERE nome='$nome'";
        if ($conexao->query($sqlDelete) === TRUE) {
            $_SESSION['mensagem'] = "Usuário '$nome' excluído com sucesso.";
        } else {
            $_SESSION['mensagem'] = "Erro ao excluir o usuário: " . $conexao->error;
        }
    } else {
        $_SESSION['mensagem'] = "Usuário '$nome' não encontrado.";
    }

    // Redireciona para o sistema com uma mensagem
    header('Location: sistema.php');
    exit();
} else {
    $_SESSION['mensagem'] = "Nenhum usuário especificado para exclusão.";
    header('Location: sistema.php');
    exit();
}
?>
