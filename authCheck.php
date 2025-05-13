<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Redireciona para a página de login se não estiver logado
    session_unset(); // Remove todas as variáveis de sessão
    session_destroy();
    header("Location: frmlogin.php");
    exit;

}
?>