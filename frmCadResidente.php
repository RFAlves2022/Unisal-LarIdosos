<?php
include_once "header.php";
include_once "cadastrarResidente.php"; // Inclui o script de cadastro de residente
?>

<main class="container mt-4">
    <div class="card bg-light shadow-sm rounded-lg">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <a href="listResidentes.php" class="btn text-white" style="background-color: #5D737E;">Voltar</a>
                <h2 class="mb-0 text-center flex-grow-1 color1">Cadastro de Residente</h2>
            </div>
        </div>
        <div class="card-body mt-5">
            <?php
            // Exibe mensagens de sucesso ou erro
            if (isset($cadastro_sucesso)) {
                echo "<div class='alert alert-success' role='alert'>Residente cadastrado com sucesso!</div>";
            }
            if (isset($cadastro_erro)) {
                echo "<div class='alert alert-danger' role='alert'>Erro ao cadastrar residente.</div>";
            }
            if (isset($erro_conexao)) {
                echo "<div class='alert alert-danger' role='alert'>" . $erro_conexao . "</div>";
            }
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="mx-auto" style="max-width: 850px;">
                <div class="row mb-3 justify-content-center">
                    <div class="col-8">
                        <label for="nome" class="form-label">Nome Completo:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="data_nasc" name="data_nasc">
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-4">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                    <div class="col-3">
                        <label for="rg" class="form-label">RG:</label>
                        <input type="text" class="form-control" id="rg" name="rg">
                    </div>
                    <div class="col-4">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone">
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-11">
                        <label for="endereco" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco">
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-9">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-2">
                        <label for="quarto" class="form-label">Quarto:</label>
                        <input type="text" class="form-control" id="quarto" name="quarto">
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-6">
                        <label for="medicamentos" class="form-label">Medicamentos:</label>
                        <input type="text" class="form-control" id="medicamentos" name="medicamentos">
                    </div>
                    <div class="col-5">
                        <label for="alergias" class="form-label">Alergias:</label>
                        <input type="text" class="form-control" id="alergias" name="alergias">
                    </div>
                </div>
                <div class="row mb-4 justify-content-center">
                    <div class="col-11">
                        <label for="restricoes_alimentares" class="form-label">Restrições Alimentares:</label>
                        <textarea class="form-control mb-2" id="restricoes_alimentares" name="restricoes_alimentares"></textarea>
                    </div>
                </div>
                <hr class="m-4">
                <h4 class="color1 text-center mb-5">Informações do Responsável</h4>
                <div class="row mb-3 justify-content-center">
                    <div class="col-8">
                        <label for="responsavel_nome" class="form-label">Nome do Responsável:</label>
                        <input type="text" class="form-control" id="responsavel_nome" name="responsavel_nome">
                    </div>
                    <div class="col-3">
                        <label for="responsavel_telefone" class="form-label">Telefone do Responsável:</label>
                        <input type="tel" class="form-control" id="responsavel_telefone" name="responsavel_telefone">
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-6">
                        <label for="responsavel_email" class="form-label">Email do Responsável:</label>
                        <input type="email" class="form-control" id="responsavel_email" name="responsavel_email">
                    </div>
                    <div class="col-5">
                        <label for="parente_grau" class="form-label">Grau de Parentesco:</label>
                        <input type="text" class="form-control" id="parente_grau" name="parente_grau">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-2 mb-5" style="background-color: #5D737E;">Cadastrar Residente</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include_once "footer.php"; ?>

