<?php 
include_once "header.php"; 
include_once "dbConnection.php";

$residentes = [];
try {
    $stmt = $pdo->query("
        SELECT r.id, r.nome 
        FROM tb_residentes r
        INNER JOIN tb_rotina_residente rr ON rr.resident_id = r.id
        GROUP BY r.id, r.nome
        ORDER BY r.nome
    ");
    $residentes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo '<div class="alert alert-danger text-center">Erro ao buscar residentes: ' . htmlspecialchars($e->getMessage()) . '</div>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nova_observacao'])) {
    $residente_id = $_POST['residente_id'];
    $observacao = trim($_POST['observacao']);

    if ($residente_id && $observacao) {
        try {
            $stmt = $pdo->prepare("INSERT INTO tb_observacoes_dia (resident_id, observacao) VALUES (?, ?)");
            $stmt->execute([$residente_id, $observacao]);
            echo '<div class="alert alert-success text-center">Observação cadastrada com sucesso!</div>';
        } catch (Exception $e) {
            echo '<div class="alert alert-danger text-center">Erro ao cadastrar observação: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}

$residente_id = $_GET['residente_id'] ?? ($_POST['residente_id'] ?? '');
$residente = null;
$rotina = null;
$atividades = [];
$cuidados = '';
$observacoes = [];

if ($residente_id) {
    $stmt = $pdo->prepare("SELECT * FROM tb_residentes WHERE id = ?");
    $stmt->execute([$residente_id]);
    $residente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($residente) {
        $stmt = $pdo->prepare("SELECT * FROM tb_rotina_residente WHERE resident_id = ? ORDER BY criado_em DESC LIMIT 1");
        $stmt->execute([$residente['id']]);
        $rotina = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rotina) {
            $stmt = $pdo->prepare("SELECT * FROM tb_rotina_atividade WHERE rotina_id = ? ORDER BY hora");
            $stmt->execute([$rotina['id']]);
            $atividades = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $cuidados = $rotina['cuidados_especiais'];
        }
    }
}

$observacoes = [];
if ($residente_id) {
    $stmt = $pdo->prepare("SELECT observacao, data_hora FROM tb_observacoes_dia WHERE resident_id = ? ORDER BY data_hora DESC");
    $stmt->execute([$residente_id]);
    $observacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<main>
    <section class="py-5" style="background: linear-gradient(135deg, #e0f7fa 0%, #f8fafc 100%); min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-gradient" style="background: linear-gradient(90deg, #5D737E 60%, #64B6AC 100%);">
                            <div class="position-relative">
                                <h2 class="mb-0 text-center py-3 d-flex justify-content-center align-items-center gap-3" style="width: 100%;">
                                    <i class="bi bi-calendar2-week"></i> Rotina Diária do Residente
                                </h2>
                                <div class="position-absolute top-50 end-0 translate-middle-y d-flex align-items-center gap-2 me-3">
                                    <a href="rotinaCadastro.php" class="btn btn-link p-0 align-middle" title="Cadastrar/Editar Rotina" >
                                        <i class="bi bi-pencil-square fs-3 color1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <form class="d-flex justify-content-center align-items-center mb-4" method="get" action="rotina.php">
                                <div class="input-group" style="max-width: 400px;">
                                    <select class="form-select" name="residente_id" required>
                                        <option value="">Selecione o residente...</option>
                                        <?php foreach ($residentes as $r): ?>
                                            <option value="<?= $r['id'] ?>" <?= ($residente_id == $r['id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($r['nome']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button class="btn btn-primary" type="submit" style="background-color: #64B6AC;">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                            <?php if ($residente && $rotina): ?>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm" style="min-height: 120px;">
                                        <div class="card-body text-center py-3">
                                            <i class="bi bi-alarm fs-1 text-primary"></i>
                                            <h5 class="mt-2 mb-1 text-secondary">Hora de Acordar</h5>
                                            <p class="fs-4 fw-semibold mb-0"><?= htmlspecialchars(substr($rotina['hora_acordar'],0,5)) ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm" style="min-height: 120px;">
                                        <div class="card-body text-center py-3">
                                            <i class="bi bi-moon-stars fs-1 text-dark"></i>
                                            <h5 class="mt-2 mb-1 text-secondary">Hora de Dormir</h5>
                                            <p class="fs-4 fw-semibold mb-0"><?= htmlspecialchars(substr($rotina['hora_dormir'],0,5)) ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <i class="bi bi-cup-straw fs-1 text-success d-block text-center"></i>
                                            <h5 class="mt-3 mb-3 text-secondary text-center">Horários das Refeições</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Café da manhã <span class="badge bg-success"><?= htmlspecialchars(substr($rotina['refeicao_cafe'],0,5)) ?></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Almoço <span class="badge bg-success"><?= htmlspecialchars(substr($rotina['refeicao_almoco'],0,5)) ?></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Lanche da tarde <span class="badge bg-success"><?= htmlspecialchars(substr($rotina['refeicao_lanche'],0,5)) ?></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Jantar <span class="badge bg-success"><?= htmlspecialchars(substr($rotina['refeicao_jantar'],0,5)) ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <i class="bi bi-capsule-pill fs-1 text-info d-block text-center"></i>
                                            <h5 class="mt-3 mb-3 text-secondary text-center">Horários das Medicações</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Manhã <span class="badge bg-info text-dark"><?= htmlspecialchars(substr($rotina['medicacao_manha'],0,5)) ?></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Tarde <span class="badge bg-info text-dark"><?= htmlspecialchars(substr($rotina['medicacao_tarde'],0,5)) ?></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Noite <span class="badge bg-info text-dark"><?= htmlspecialchars(substr($rotina['medicacao_noite'],0,5)) ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <i class="bi bi-people fs-1 text-warning d-block text-center"></i>
                                            <h5 class="mt-3 mb-3 text-secondary text-center">Atividades Programadas</h5>
                                            <ul class="list-group list-group-flush">
                                                <?php foreach ($atividades as $atv): ?>
                                                <li class="list-group-item">
                                                    <span class="fw-bold text-primary"><?= htmlspecialchars(substr($atv['hora'],0,5)) ?></span> - <?= htmlspecialchars($atv['descricao']) ?>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <i class="bi bi-shield-plus fs-1 text-danger d-block text-center"></i>
                                            <h5 class="mt-3 mb-3 text-secondary text-center">Cuidados Especiais</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><?= nl2br(htmlspecialchars($cuidados)) ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <i class="bi bi-journal-text fs-1 text-secondary d-block text-center"></i>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="mt-3 mb-0 text-secondary text-center flex-grow-1">Observações do Dia</h5>
                                            </div>
                                            <ul class="list-group list-group-flush d-flex flex-wrap justify-content-center" style="column-count: 2;">
                                                <?php foreach ($observacoes as $obs): ?>
                                                <li class="list-group-item w-100" style="break-inside: avoid;">
                                                    <span class="text-secondary" style="font-size: 0.85em;">
                                                        <?= date('d/m/Y H:i', strtotime($obs['data_hora'])) ?>:
                                                    </span>
                                                    <span class="fw-bold text-dark ms-1"><?= htmlspecialchars($obs['observacao']) ?></span>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php if ($residente_id): ?>
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#novaObservacaoModal" style="background-color: #64B6AC;">
                                                    <i class="bi bi-plus-circle"></i> Nova Observação
                                                </button>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="alertasModal" tabindex="-1" aria-labelledby="alertasModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title text-dark" id="alertasModalLabel">
                                                    <i class="bi bi-exclamation-triangle-fill"></i> Alertas
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item text-warning fw-semibold">
                                                        <i class="bi bi-exclamation-circle"></i> Medicação da tarde atrasada ontem.
                                                    </li>
                                                    <li class="list-group-item text-warning fw-semibold">
                                                        <i class="bi bi-exclamation-circle"></i> Consultar fisioterapeuta sobre dor no joelho.
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php elseif ($residente_id): ?>
                                <div class="alert alert-warning text-center mt-4">Residente não encontrado ou sem rotina cadastrada.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="modal fade" id="novaObservacaoModal" tabindex="-1" aria-labelledby="novaObservacaoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="novaObservacaoModalLabel"><i class="bi bi-journal-plus"></i> Nova Observação</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="residente_id" value="<?= htmlspecialchars($residente_id) ?>">
          <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <input type="text" name="observacao" id="observacao" class="form-control" required placeholder="Digite a observação">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="nova_observacao" class="btn btn-success" style="background-color: #64B6AC;">
            <i class="bi bi-plus-circle"></i> Salvar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php include_once "footer.php"; ?>
