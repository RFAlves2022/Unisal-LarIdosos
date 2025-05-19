<?php
include_once "header.php";
include_once "dbConnection.php"; // Inclui a conexão com o banco de dados
$search = $_GET['search'] ?? '';
require "medQuerys.php";
?>
<main class="container mt-4 mb-5">
    <div class="card bg-light shadow-sm rounded-lg mb-5">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <a href="dashboard.php" class="btn text-white" style="background-color: #5D737E;">Voltar</a>
                <h2 class="mb-0 text-center flex-grow-1 color1">Controle de Medicamentos</h2>
            </div>
        </div>
        <div class="card-body d-flex flex-column">
            <!-- Barra de busca -->
            <form method="GET" class="mb-4">
                <div class="input-group mx-auto" style="max-width: 400px;">
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar por residente ou medicamento..." value="<?= htmlspecialchars($search) ?>">
                    <button class="btn btn-primary" type="submit" style="background-color: #5D737E;">Buscar</button>
                </div>
            </form>

            <!-- Tabela de Medicamentos -->
            <div class="table-responsive table-rounded flex-grow-1" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered table-striped mb-0 text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Residente</th>
                            <th>Medicamento</th>
                            <th>Horário</th>
                            <th>Dosagem</th>
                            <th>Via de Administração</th>
                            <th>Observações</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($medicamentos) > 0): ?>
                            <?php foreach ($medicamentos as $med): ?>
                                <tr class="editable-row"
                                    data-id="<?= $med['id'] ?>"
                                    data-resident_id="<?= $med['resident_id'] ?>"
                                    data-nome_medicamento="<?= htmlspecialchars($med['nome_medicamento']) ?>"
                                    data-horario="<?= htmlspecialchars($med['horario']) ?>"
                                    data-dosagem="<?= htmlspecialchars($med['dosagem']) ?>"
                                    data-via_adm="<?= htmlspecialchars($med['via_adm']) ?>"
                                    data-observacoes="<?= htmlspecialchars($med['observacoes']) ?>">
                                    <td><?= htmlspecialchars($med['residente']) ?></td>
                                    <td><?= htmlspecialchars($med['nome_medicamento']) ?></td>
                                    <td><?= htmlspecialchars(substr($med['horario'], 0, 5)) ?></td>
                                    <td><?= htmlspecialchars($med['dosagem']) ?></td>
                                    <td><?= htmlspecialchars($med['via_adm']) ?></td>
                                    <td><?= htmlspecialchars($med['observacoes']) ?></td>
                                    <td>
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= $med['id'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este medicamento?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Nenhum medicamento encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Formulário para cadastrar ou editar medicamento -->
            <div class="mt-4">
                <h4 class="text-center color1">Gerenciar Medicamento</h4>
                <form method="POST" class="mt-3">
                    <input type="hidden" name="action" id="form-action" value="create">
                    <input type="hidden" name="id" id="medicamento-id">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="resident_id" class="form-label">Residente</label>
                            <select class="form-select" id="resident_id" name="resident_id" required>
                                <?php
                                $residentes = $pdo->query("SELECT id, nome FROM tb_residentes ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($residentes as $residente) {
                                    echo "<option value='{$residente['id']}'>{$residente['nome']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nome_medicamento" class="form-label">Nome do Medicamento</label>
                            <input type="text" class="form-control" id="nome_medicamento" name="nome_medicamento" required>
                        </div>
                        <div class="col-md-4">
                            <label for="horario" class="form-label">Horário</label>
                            <input type="time" class="form-control" id="horario" name="horario" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="dosagem" class="form-label">Dosagem</label>
                            <input type="text" class="form-control" id="dosagem" name="dosagem" required>
                        </div>
                        <div class="col-md-4">
                            <label for="via_adm" class="form-label">Via de Administração</label>
                            <input type="text" class="form-control" id="via_adm" name="via_adm" required>
                        </div>
                        <div class="col-md-4">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" style="background-color: #64B6AC;" id="submit-button">Cadastrar Medicamento</button>
                        <button type="button" class="btn btn-secondary" style="background-color: #5D737E;" id="new-button">Limpar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="medEvents.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        <?php if (isset($_SESSION['message'])): ?>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: '<?= $_SESSION['message'] ?>',
                timer: 3000,
                showConfirmButton: false
            });
            <?php unset($_SESSION['message']); // Limpa a mensagem da sessão ?>
        <?php elseif (isset($_SESSION['error'])): ?>
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: '<?= $_SESSION['error'] ?>',
                timer: 3000,
                showConfirmButton: false
            });
            <?php unset($_SESSION['error']); // Limpa a mensagem da sessão ?>
        <?php endif; ?>
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('.editable-row');
    rows.forEach(row => {
        row.addEventListener('click', function() {
            rows.forEach(r => r.classList.remove('table-warning'));
            this.classList.add('table-warning');
        });
    });
});
</script>
  
<?php include_once "footer.php"; ?>
