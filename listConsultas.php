<?php
include_once "header.php";
include_once "dbConnection.php"; // Inclui a conexão com o banco de dados
$search = $_GET['search'] ?? '';
include_once "consultasQuerys.php"; // Inclui o backend de consultas
?>

<main class="container mt-4 mb-5">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php elseif (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="card bg-light shadow-sm rounded-lg mb-5">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <a href="dashboard.php" class="btn text-white" style="background-color: #5D737E;">Voltar</a>
                <h2 class="mb-0 text-center flex-grow-1 color1">Controle de Consultas</h2>
            </div>
        </div>
        <div class="card-body d-flex flex-column">
            <!-- Barra de busca -->
            <form method="GET" class="mb-4">
                <div class="input-group mx-auto" style="max-width: 400px;">
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar por residente ou médico..." value="<?= htmlspecialchars($search) ?>">
                    <button class="btn btn-primary" type="submit" style="background-color: #5D737E;">Buscar</button>
                </div>
            </form>

            <!-- Tabela de Consultas -->
            <div class="table-responsive table-rounded flex-grow-1" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered table-striped mb-0 text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Residente</th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Médico</th>
                            <th>Especialidade</th>
                            <th>Observações</th>
                            <th>Prescrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($consultas) > 0): ?>
                            <?php foreach ($consultas as $consulta): ?>
                                <tr class="editable-row"
                                    data-id="<?= $consulta['id'] ?>"
                                    data-resident_id="<?= $consulta['resident_id'] ?>"
                                    data-data_consulta="<?= $consulta['data_consulta'] ?>"
                                    data-horario="<?= $consulta['horario'] ?>"
                                    data-medico="<?= htmlspecialchars($consulta['medico']) ?>"
                                    data-especialidade="<?= htmlspecialchars($consulta['especialidade']) ?>"
                                    data-observacoes="<?= htmlspecialchars($consulta['observacoes']) ?>"
                                    data-prescricao="<?= htmlspecialchars($consulta['prescricao']) ?>">
                                    <td><?= htmlspecialchars($consulta['residente']) ?></td>
                                    <td><?= htmlspecialchars(date('d/m/Y', strtotime($consulta['data_consulta']))) ?></td>
                                    <td><?= htmlspecialchars(substr($consulta['horario'], 0, 5)) ?></td>
                                    <td><?= htmlspecialchars($consulta['medico']) ?></td>
                                    <td><?= htmlspecialchars($consulta['especialidade']) ?></td>
                                    <td><?= htmlspecialchars($consulta['observacoes']) ?></td>
                                    <td><?= htmlspecialchars($consulta['prescricao']) ?></td>
                                    <td>
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= $consulta['id'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta consulta?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Nenhuma consulta encontrada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Formulário para cadastrar ou editar consulta -->
            <div class="mt-4">
                <h4 class="text-center color1">Gerenciar Consulta</h4>
                <form method="POST" class="mt-3">
                    <input type="hidden" name="action" id="form-action" value="create">
                    <input type="hidden" name="id" id="consulta-id">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="resident_id" class="form-label">Residente</label>
                            <select class="form-select" id="resident_id" name="resident_id" required>
                                <?php
                                $residentes = $pdo->query("SELECT id, nome FROM tb_residentes ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
                                if (count($residentes) > 0):
                                    echo "<option value='' disabled selected>Selecione um residente</option>";
                                    foreach ($residentes as $residente) {
                                        echo "<option value='{$residente['id']}'>{$residente['nome']}</option>";
                                    }
                                else:
                                    echo "<option value='' disabled selected>Nenhum residente disponível</option>";
                                endif;
                                ?>
                            </select>
                            <?php if (count($residentes) === 0): ?>
                                <div class="mt-2">
                                    <a href="cadastrarResidente.php" class="btn btn-sm btn-primary">Cadastrar Residente</a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            <label for="data_consulta" class="form-label">Data da Consulta</label>
                            <input type="date" class="form-control" id="data_consulta" name="data_consulta" required>
                        </div>
                        <div class="col-md-4">
                            <label for="horario" class="form-label">Horário</label>
                            <input type="time" class="form-control" id="horario" name="horario">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="medico" class="form-label">Médico</label>
                            <input type="text" class="form-control" id="medico" name="medico" required>
                        </div>
                        <div class="col-md-4">
                            <label for="especialidade" class="form-label">Especialidade</label>
                            <input type="text" class="form-control" id="especialidade" name="especialidade">
                        </div>
                        <div class="col-md-4">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="prescricao" class="form-label">Prescrição</label>
                            <textarea class="form-control" id="prescricao" name="prescricao"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" style="background-color: #64B6AC;" id="submit-button">Cadastrar Consulta</button>
                        <button type="button" class="btn btn-secondary" style="background-color: #5D737E;" id="new-button">Limpar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="consultasEvents.js"></script>

<?php include_once "footer.php"; ?>