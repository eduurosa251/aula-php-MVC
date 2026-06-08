<?php
 
// Configurações do banco de dados
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agenda');
 
try {
 
    // String de conexão
    $dsn = 'mysql:host=' . DB_HOST .
           ';port=' . DB_PORT .
           ';dbname=' . DB_NAME .
           ';charset=utf8mb4';
 
    // Criando conexão PDO
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
 
        // Mostra erros como exceções
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
 
        // Retorna resultados como array associativo
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
 
        // Desativa emulação de prepared statements
        PDO::ATTR_EMULATE_PREPARES => false
 
    ]);
 
    echo "Conexão realizada com sucesso!";
 
} catch (PDOException $e) {
 
    die('Erro de conexão: ' . $e->getMessage());
 
}
 
?>