<?php
// Informações de conexão
$host = 'localhost';        // ou IP do servidor MySQL
$dbname = 'db_integrador';  // SUBSTITUA pelo nome real do seu banco
$user = 'root';       // SUBSTITUA pelo nome de usuário do MySQL
$pass = '';         // SUBSTITUA pela senha do MySQL

try {
    // Criação da conexão PDO com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de falha na conexão, exibe o erro e para a execução
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}