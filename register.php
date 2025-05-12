<?php
session_start();
require_once "dbConnection.php"; // Conexão com o banco

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        // Criptografa a senha com password_hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Insere no banco
            $stmt = $pdo->prepare("INSERT INTO tb_users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            $mensagem = "Usuário cadastrado com sucesso!";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $mensagem = "Usuário já existe!";
            } else {
                $mensagem = "Erro: " . $e->getMessage();
            }
        }
    } else {
        $mensagem = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mb-4 text-center">Cadastro de Usuário</h3>

            <?php if (!empty($mensagem)): ?>
                <div class="alert alert-info"><?= $mensagem ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Usuário</label>
                    <input type="text" name="username" class="form-control" required />
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" required />
                </div>

                <button type="submit" class="btn btn-success w-100">Cadastrar</button>
            </form>

            <div class="mt-3 text-center">
                <a href="login.php" class="text-decoration-none">Ir para o login</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
