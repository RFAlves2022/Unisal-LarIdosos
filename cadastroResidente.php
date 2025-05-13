<?php
include_once "dbConnection.php"; // Conexão com o banco de dados
include_once "authCheck.php"; // Verifica se o usuário está logado
include_once "header.php"; // Cabeçalho da página
$stmt = $pdo->query("SELECT id, username FROM tb_users ORDER BY username ASC");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

/** TABELA DE RESIDENTES -  CRIAR TABELA
 * | Coluna                | Tipo         | Restrições                      | Descrição                                                                  |
|-----------------------|--------------|---------------------------------|----------------------------------------------------------------------------|
| id                    | INT          | PRIMARY KEY, AUTO_INCREMENT     | Identificador único do residente                                           |
| nome                  | VARCHAR(255) | NOT NULL                        | Nome completo do residente                                                  |
| data_nascimento       | DATE         |                                 | Data de nascimento do residente                                             |
| cpf                   | VARCHAR(14)  | UNIQUE                          | Cadastro de Pessoa Física do residente (único)                               |
| rg                    | VARCHAR(20)  | UNIQUE                          | Registro Geral do residente (único)                                         |
| endereco              | VARCHAR(255) |                                 | Endereço completo do residente                                               |
| telefone              | VARCHAR(20)  |                                 | Número de telefone do residente                                             |
| email                 | VARCHAR(100) |                                 | Endereço de e-mail do residente                                             |
| data_cadastro         | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP       | Data e hora em que o residente foi cadastrado                               |
| data_atualizacao      | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP, ON UPDATE CURRENT_TIMESTAMP | Data e hora da última atualização das informações do residente           |
| observacoes           | TEXT         |                                 | Observações adicionais sobre o residente                                   |
| quarto                | VARCHAR(50)  |                                 | Número ou identificação do quarto do residente                              |
| medicamentos          | TEXT         |                                 | Lista de medicamentos do residente                                          |
| alergias              | TEXT         |                                 | Lista de alergias do residente                                              |
| restricoes_alimentares| TEXT         |                                 | Restrições alimentares do residente                                         |
| responsavel_nome      | VARCHAR(255) |                                 | Nome completo do responsável pelo residente                                |
| responsavel_telefone  | VARCHAR(20)  |                                 | Telefone do responsável                                                     |
| responsavel_email     | VARCHAR(100) |                                 | E-mail do responsável                                                     |
| parente_grau          | VARCHAR(50)  |                                 | Grau de parentesco do responsável com o residente                          |
 */
?>

<main class="container">
    <form action="processar_cadastro.php" method="POST" class="mx-auto formulario-molde bgColor5"style="max-width: 850px; border: 1px solid #ccc; padding: 20px;" >
        <h2 class="color1 mb-5 text-center">Cadastro de Residente</h2>
        <div class="row mb-3 justify-content-center">
            <div class="col-8">
                <label for="nome" class="form-label">Nome Completo:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
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
</main>


<?php include_once "footer.php"; // Rodapé da página 
?>

