<?php
require __DIR__ . '/vendor/autoload.php';

use Source\Core\Connect;

try {
    $pdo = Connect::getInstance();
    echo "✅ Conexão bem-sucedida: " . $pdo->getAttribute(\PDO::ATTR_CONNECTION_STATUS);
} catch (\PDOException $e) {
    echo "❌ Erro de conexão: " . $e->getMessage();
}
