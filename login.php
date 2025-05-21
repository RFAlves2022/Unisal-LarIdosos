<?php
include_once "dbConnection.php";
session_start();
require_once "loginValidation.php";
?>




<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/abstract-icon.png" type="image/png">
    <title>Kairos - Page</title>
</head>

<body>

    <main>
        <section class="vh-100" style="background-color: #DAFFEF;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="img/img-loginPage.png" alt="Formulario Login" class="img-fluid mt-5 pt-2"
                                        style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        <?php if (!empty($erro)): ?>
                                            <div class="alert alert-danger py-2"><?= $erro ?></div>
                                        <?php endif; ?>
                                        <form method="POST">
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <img src="img/logotipo-kairos.png" alt="Logo" width="90" height="90"
                                                    class="me-2">
                                                <span id="logo-login" class="h1 fw-bold mb-0"
                                                    style="color: #5D737E;">Kairos</span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Bem-vindo!</h5>

                                            <div class="form-outline mb-4">
                                                <label class="form-label">Usuario:</label>
                                                <input type="text" name="username" class="form-control form-control-lg"
                                                    required />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label">Senha:</label>
                                                <input type="password" name="password" class="form-control form-control-lg" required />
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-lg btn-block text-white" type="submit"
                                                    style="background-color: #5D737E;">Entrar</button>
                                            </div>
                                            <a class="small text-muted" href="#!">Esqueceu a senha?</a><br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include_once "footer.php" ?>