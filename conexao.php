<?php
ini_set('display_errors', '0');
$configFile = __DIR__ . '/config.local.php';
if (!is_file($configFile)) {
    http_response_code(503);
    exit('Copie config.exemplo.php para config.local.php e configure seu banco local.');
}
$config = require $configFile;
try {
    $conexao = new PDO(
        'mysql:host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['database'] . ';charset=utf8mb4',
        $config['user'], $config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false]
    );
} catch (PDOException $erro) {
    http_response_code(503);
    exit('Não foi possível conectar ao banco local. Confira a configuração.');
}
