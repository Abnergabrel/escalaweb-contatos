<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário de contato</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <main>
        <h1>Entre em contato</h1>
        <p>Preencha os campos abaixo para enviar sua mensagem.</p>

        <form action="salvar.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" maxlength="100" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" maxlength="100" required>

            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" maxlength="20" required>

            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" rows="5" required></textarea>

            <button type="submit">Enviar contato</button>
        </form>

        <p><a href="contatos.php">Ver contatos cadastrados</a></p>
    </main>
</body>
</html>
