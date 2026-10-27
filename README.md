# EscalaWeb — Cadastro de contatos

Sistema de cadastro e consulta de contatos com PHP, MySQL e PDO. O formulário recebe nome, e-mail, telefone e mensagem, salva os dados no banco e permite consultar os registros cadastrados.

## Funcionalidades

- Cadastro de contatos pelo formulário.
- Validação de campos obrigatórios, formato de e-mail e limites de tamanho.
- Gravação no MySQL com consultas preparadas.
- Listagem dos contatos, do mais recente para o mais antigo.
- Escape de HTML na exibição dos dados.

## Tecnologias

PHP 8, MySQL, PDO, HTML e CSS.

## Como executar

1. Configure um servidor local com PHP 8, as extensões PDO MySQL e mbstring e um banco MySQL. Você pode usar o XAMPP.
2. Crie o banco `escalaweb_demo` e importe o arquivo `banco.sql`.
3. Copie `config.exemplo.php` para `config.local.php` e preencha os dados da conexão. Esse arquivo fica fora do versionamento.
4. Coloque o projeto na pasta do servidor local e acesse `index.php` pelo navegador.
5. Cadastre um contato de teste e abra `contatos.php` para conferir o registro.

## Arquivos principais

- `index.php`: formulário de contato.
- `salvar.php`: validação e gravação dos dados.
- `conexao.php`: conexão com o MySQL.
- `contatos.php`: consulta e exibição dos contatos.
- `banco.sql`: estrutura da tabela.
- `config.exemplo.php`: modelo de configuração local.
- `estilo.css`: estilos das páginas.

## Limitações

Projeto de estudo para execução local, com dados fictícios. O envio de e-mail está desativado. A listagem não possui autenticação e o formulário ainda não implementa proteção CSRF ou limitação de envios. Esses recursos são necessários antes de disponibilizar o sistema para uso com dados reais.
