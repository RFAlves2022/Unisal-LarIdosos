<?php
$server = "127.0.0.1";
$user = "root";
$password = "";
$database = "db_integrador";

try {
    $conn = new mysqli($server, $user, $password, $database);
} catch (mysqli_sql_exception $e) {
    echo "Falha na conexão: " . $e->getMessage();
    exit;
}
