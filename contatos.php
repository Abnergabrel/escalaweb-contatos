<?php
require 'conexao.php';

try {
    $comando = $conexao->query('SELECT id, nome, email, telefone, mensagem FROM contatos ORDER BY id DESC');
    $contatos = $comando->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    error_log('Erro ao listar contatos: ' . $erro->getMessage());
    die('Não foi possível buscar os contatos.');
}

function mostrar($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contatos cadastrados</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <main class="lista">
        <h1>Contatos cadastrados</h1>
        <p><a href="index.php">Voltar ao formulário</a></p>

        <?php if (count($contatos) === 0): ?>
            <p>Nenhum contato cadastrado ainda.</p>
        <?php else: ?>
            <div class="tabela">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Mensagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contatos as $contato): ?>
                            <tr>
                                <td><?= mostrar($contato['id']) ?></td>
                                <td><?= mostrar($contato['nome']) ?></td>
                                <td><?= mostrar($contato['email']) ?></td>
                                <td><?= mostrar($contato['telefone']) ?></td>
                                <td><?= nl2br(mostrar($contato['mensagem'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
