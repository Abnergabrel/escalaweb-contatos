<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

require 'conexao.php';

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$mensagem = trim($_POST['mensagem'] ?? '');

if ($nome === '' || $telefone === '' || $mensagem === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    die('Preencha todos os campos corretamente. <a href="index.php">Voltar</a>');
}

if (mb_strlen($nome, 'UTF-8') > 100 || mb_strlen($email, 'UTF-8') > 100 || mb_strlen($telefone, 'UTF-8') > 20) {
    http_response_code(400);
    die('Um dos campos passou do limite de caracteres. <a href="index.php">Voltar</a>');
}

try {
    // Os valores são enviados separados para evitar SQL Injection.
    $sql = 'INSERT INTO contatos (nome, email, telefone, mensagem)
            VALUES (:nome, :email, :telefone, :mensagem)';
    $comando = $conexao->prepare($sql);
    $comando->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':mensagem' => $mensagem
    ]);
} catch (PDOException $erro) {
    error_log('Erro ao salvar contato: ' . $erro->getMessage());
    die('Erro ao salvar o contato no banco.');
}

// Envio desativado nesta demonstração local.
$enviouEmail = false;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contato recebido</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <main>
        <h1>Contato salvo!</h1>
        <?php if ($enviouEmail): ?>
            <p>O contato foi salvo e o envio do e-mail foi solicitado ao servidor.</p>
        <?php else: ?>
            <p>O contato foi salvo. O envio de e-mail está desativado nesta demonstração.</p>
            <p>Use apenas dados fictícios no ambiente de demonstração.</p>
        <?php endif; ?>
        <p><a href="index.php">Novo contato</a> | <a href="contatos.php">Ver contatos</a></p>
    </main>
</body>
</html>
