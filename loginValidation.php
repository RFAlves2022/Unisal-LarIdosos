<?php

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        try {
            // Consulta o banco para verificar o usuário
            $stmt = $pdo->prepare("SELECT * FROM tb_users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Login bem-sucedido, salva o usuário na sessão
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redireciona para a página inicial ou dashboard
                header("Location: dashboard.php");
                exit;
            } else {
                $erro = "Usuário ou senha inválidos.";
            }
        } catch (PDOException $e) {
            $erro = "Erro ao verificar login: " . $e->getMessage();
        }
    } else {
        $erro = "Preencha todos os campos.";
    }
}
?>