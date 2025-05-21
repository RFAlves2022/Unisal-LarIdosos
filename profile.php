<?php 
include_once "header.php"; 
require_once "dbConnection.php"; 
require_once "profileQuerys.php";

?>
<main>
    <div class="container mt-5">
        <h1 class="text-center color1">Meu Perfil</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Informações Pessoais</h5>
                        <hr>
                        <p class="card-text"><strong>Nome:</strong> <?php echo $_SESSION['username']; ?></p>
                        <p class="card-text"><strong>Data de Criação:</strong> <?php echo date('d/m/Y', strtotime($_SESSION['data_criacao'])); ?></p>
                        <a href="#" class="btn mt-5 text-white" data-bs-toggle="modal" data-bs-target="#changePasswordModal" style="background-color: #5D737E;">Alterar Senha</a>
                        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="changePasswordModalLabel">Alterar Senha</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="profile.php" method="POST">
                                            <div class="mb-3">
                                                <label for="currentPassword" class="form-label">Senha Atual</label>
                                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="newPassword" class="form-label">Nova Senha</label>
                                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary" style="background-color: #5D737E;">Salvar Alterações</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>   
</main>

<?php include_once "footer.php"; ?>
