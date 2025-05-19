<?php
include_once "header.php";
include_once "dbConnection.php";

// Buscar residentes para o select
$residentes = [];
try {
    $stmt = $pdo->query("SELECT id, nome FROM tb_residentes ORDER BY nome");
    $residentes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo '<div class="alert alert-danger text-center">Erro ao buscar residentes: ' . htmlspecialchars($e->getMessage()) . '</div>';
}

// Cadastro da rotina e atividades
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo->beginTransaction();

        $resident_id = $_POST['resident_id'];

        $stmt = $pdo->prepare("INSERT INTO tb_rotina_residente (
            resident_id, hora_acordar, hora_dormir, refeicao_cafe, refeicao_almoco, refeicao_lanche, refeicao_jantar,
            medicacao_manha, medicacao_tarde, medicacao_noite, cuidados_especiais
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $resident_id,
            $_POST['hora_acordar'],
            $_POST['hora_dormir'],
            $_POST['refeicao_cafe'],
            $_POST['refeicao_almoco'],
            $_POST['refeicao_lanche'],
            $_POST['refeicao_jantar'],
            $_POST['medicacao_manha'],
            $_POST['medicacao_tarde'],
            $_POST['medicacao_noite'],
            $_POST['cuidados_especiais']
        ]);
        $rotina_id = $pdo->lastInsertId();

        $i = 1;
        while (isset($_POST["atividade_hora_$i"]) && isset($_POST["atividade_desc_$i"])) {
            $hora = $_POST["atividade_hora_$i"];
            $desc = $_POST["atividade_desc_$i"];
            if ($hora && $desc) {
                $stmt = $pdo->prepare("INSERT INTO tb_rotina_atividade (rotina_id, hora, descricao) VALUES (?, ?, ?)");
                $stmt->execute([$rotina_id, $hora, $desc]);
            }
            $i++;
        }

        $pdo->commit();
        echo '<div class="alert alert-success text-center">Rotina cadastrada com sucesso!</div>';
    } catch (Exception $e) {
        $pdo->rollBack();
        echo '<div class="alert alert-danger text-center">Erro ao cadastrar rotina: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}
?>

<main>
    <section class="py-5" style="background: linear-gradient(135deg, #e0f7fa 0%, #f8fafc 100%); min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-gradient" style="background: linear-gradient(90deg, #5D737E 60%, #64B6AC 100%);">
                            <h2 class="mb-0 text-center py-3 d-flex justify-content-center align-items-center gap-3">
                                <i class="bi bi-pencil-square"></i> Cadastro/Alteração de Rotina do Residente
                            </h2>
                        </div>
                        <div class="card-body p-5">
                            <form method="POST" autocomplete="off">
                                <div class="row g-4">
                                    <!-- Select de Residente -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Residente</label>
                                        <select name="resident_id" class="form-select" required>
                                            <option value="">Selecione o residente</option>
                                            <?php foreach ($residentes as $residente): ?>
                                                <option value="<?= $residente['id'] ?>">
                                                    <?= htmlspecialchars($residente['nome']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- Hora de Acordar e Dormir -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Hora de Acordar</label>
                                        <input type="time" class="form-control" name="hora_acordar" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Hora de Dormir</label>
                                        <input type="time" class="form-control" name="hora_dormir" required>
                                    </div>
                                    <!-- Horários das Refeições -->
                                    <div class="col-md-3">
                                        <label class="form-label">Café da manhã</label>
                                        <input type="time" class="form-control" name="refeicao_cafe" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Almoço</label>
                                        <input type="time" class="form-control" name="refeicao_almoco" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Lanche da tarde</label>
                                        <input type="time" class="form-control" name="refeicao_lanche" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Jantar</label>
                                        <input type="time" class="form-control" name="refeicao_jantar" required>
                                    </div>
                                    <!-- Horários das Medicações -->
                                    <div class="col-md-4">
                                        <label class="form-label">Medicação Manhã</label>
                                        <input type="time" class="form-control" name="medicacao_manha" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Medicação Tarde</label>
                                        <input type="time" class="form-control" name="medicacao_tarde" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Medicação Noite</label>
                                        <input type="time" class="form-control" name="medicacao_noite" required>
                                    </div>
                                    <!-- Atividades Programadas -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Atividades Programadas</label>
                                        <div id="atividades-lista" class="row g-2">
                                            <?php for ($i = 1; $i <= 4; $i++): ?>
                                            <div class="col-md-3 atividade-item">
                                                <input type="time" class="form-control mb-1" name="atividade_hora_<?= $i ?>" placeholder="Hora">
                                            </div>
                                            <div class="col-md-9 atividade-item">
                                                <input type="text" class="form-control mb-1" name="atividade_desc_<?= $i ?>" placeholder="Descrição da atividade">
                                            </div>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="text-end mt-2">
                                            <button type="button" class="btn btn-outline-primary btn-sm" id="add-atividade-btn">
                                                <i class="bi bi-plus-circle"></i> Nova Atividade
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Cuidados Especiais -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Cuidados Especiais</label>
                                        <textarea class="form-control" name="cuidados_especiais" rows="2" placeholder="Descreva os cuidados especiais"></textarea>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-5">
                                        <i class="bi bi-save"></i> Salvar Rotina
                                    </button>
                                    <a href="rotina.php" class="btn btn-secondary ms-2 px-4">
                                        <i class="bi bi-arrow-left"></i> Voltar
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
let atividadeCount = 4;
document.getElementById('add-atividade-btn').addEventListener('click', function() {
    atividadeCount++;
    const lista = document.getElementById('atividades-lista');
    const row = document.createElement('div');
    row.className = 'col-md-3 atividade-item';
    row.innerHTML = `<input type="time" class="form-control mb-1" name="atividade_hora_${atividadeCount}" placeholder="Hora">`;
    lista.appendChild(row);

    const row2 = document.createElement('div');
    row2.className = 'col-md-9 atividade-item';
    row2.innerHTML = `<input type="text" class="form-control mb-1" name="atividade_desc_${atividadeCount}" placeholder="Descrição da atividade">`;
    lista.appendChild(row2);
});

document.querySelector('form').addEventListener('input', function() {
    let filled = true;
    for (let i = 1; i <= 4; i++) {
        if (
            !document.querySelector(`[name="atividade_hora_${i}"]`).value ||
            !document.querySelector(`[name="atividade_desc_${i}"]`).value
        ) {
            filled = false;
            break;
        }
    }
    document.getElementById('add-atividade-btn').disabled = !filled;
});
</script>

<?php include_once "footer.php"; ?>