<?php
include_once "header.php";

// Exemplo de tratamento de POST (você pode adaptar para salvar no banco)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aqui você pode salvar os dados no banco ou em arquivo
    // Exemplo: $horaAcordar = $_POST['hora_acordar'];
    // ...
    echo '<div class="alert alert-success text-center">Rotina cadastrada/atualizada com sucesso!</div>';
}
?>

<main>
    <section class="py-5" style="background: linear-gradient(135deg, #e0f7fa 0%, #f8fafc 100%); min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-gradient" style="background: linear-gradient(90deg, #5D737E 60%, #64B6AC 100%);">
                            <h2 class="mb-0 text-white text-center py-3 d-flex justify-content-center align-items-center gap-3">
                                <i class="bi bi-pencil-square"></i> Cadastro/Alteração de Rotina do Residente
                            </h2>
                        </div>
                        <div class="card-body p-5">
                            <form method="POST" autocomplete="off">
                                <div class="row g-4">
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
                                        <div class="row g-2">
                                            <div class="col-md-3">
                                                <input type="time" class="form-control mb-1" name="atividade_hora_1" placeholder="Hora">
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control mb-1" name="atividade_desc_1" placeholder="Descrição da atividade">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="time" class="form-control mb-1" name="atividade_hora_2" placeholder="Hora">
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control mb-1" name="atividade_desc_2" placeholder="Descrição da atividade">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="time" class="form-control mb-1" name="atividade_hora_3" placeholder="Hora">
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control mb-1" name="atividade_desc_3" placeholder="Descrição da atividade">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="time" class="form-control mb-1" name="atividade_hora_4" placeholder="Hora">
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control mb-1" name="atividade_desc_4" placeholder="Descrição da atividade">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Cuidados Especiais -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Cuidados Especiais</label>
                                        <textarea class="form-control" name="cuidados_especiais" rows="2" placeholder="Descreva os cuidados especiais"></textarea>
                                    </div>
                                    <!-- Observações do Dia -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Observações do Dia</label>
                                        <textarea class="form-control" name="observacoes" rows="2" placeholder="Observações gerais"></textarea>
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

<!-- Bootstrap Icons CDN (adicione no <head> do seu header.php se ainda não tiver) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php include_once "footer.php"; ?>