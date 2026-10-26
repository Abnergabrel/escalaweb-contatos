# EscalaWeb — Cadastro de contatos

Demonstração de formulário de contato com PHP, MySQL e PDO, preparada a partir do sistema local de Abner Gabriel.

## Funcionalidades

- Cadastro de nome, e-mail, telefone e mensagem.
- Validação de campos obrigatórios, e-mail e limites de tamanho.
- Inserção com consultas preparadas e listagem com escape de HTML.
- Configuração local separada do código versionado.

## Executar localmente

1. Use PHP 8 com PDO MySQL e mbstring, MySQL e Apache (por exemplo, XAMPP).
2. Crie um banco local chamado `escalaweb_demo` e importe `banco.sql`. O arquivo contém somente a estrutura, sem contatos reais.
3. Copie `config.exemplo.php` para `config.local.php` e informe as credenciais do banco local. Esse arquivo é ignorado pelo Git.
4. Coloque a pasta na área de projetos do seu servidor local e abra `index.php` pelo navegador.
5. Cadastre somente dados fictícios e confira a listagem em `contatos.php`.

## Escopo da demonstração

O envio de e-mail está desativado. A listagem ainda não possui autenticação: execute somente em ambiente local com dados fictícios. Antes de hospedar uma aplicação com dados reais, implemente controle de acesso, proteção CSRF e medidas contra abuso.

Esta cópia não inclui credenciais de hospedagem, backups, ferramentas de publicação ou registros do banco real. A sintaxe dos arquivos PHP foi validada. O fluxo desta cópia com um banco local ainda precisa ser testado antes da publicação.
