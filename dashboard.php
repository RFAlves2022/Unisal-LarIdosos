<?php
include_once "header.php";
include_once "dashboardSql.php";
?>

<main>
    <div class="container text-center mt-3 mb-1">
        <div class="row justify-content-center g-4">

            <div class="col-4 col-md-2">
                <a href="listResidentes.php" class="text-decoration-none text-dark">
                    <div class="circle-link mx-auto" style="border: 2px solid #5D737E; border-radius: 50%; padding: 10px; background-color: #f8f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s, box-shadow 0.3s;">
                        <img src="img/residentes-icon.png" alt="Ícone 1" class="circle-img">
                    </div>
                    <p class="mt-2 fw-bold" style="color: #5D737E;">Residentes</p>
                </a>
            </div>

            <div class="col-4 col-md-2">
                <a href="listConsultas.php" class="text-decoration-none text-dark">
                    <div class="circle-link mx-auto" style="border: 2px solid #5D737E; border-radius: 50%; padding: 10px; background-color: #f8f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s, box-shadow 0.3s;">
                        <img src="img/Consulta-icon.png" alt="Ícone 2" class="circle-img">
                    </div>
                    <p class="mt-2 fw-bold" style="color: #5D737E;">Consultas</p>
                </a>
            </div>

            <div class="col-4 col-md-2">
                <a href="listMedicamentos.php" class="text-decoration-none text-dark">
                    <div class="circle-link mx-auto" style="border: 2px solid #5D737E; border-radius: 50%; padding: 10px; background-color: #f8f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s, box-shadow 0.3s;">
                        <img src="img/medicacao-icon.png" alt="Ícone 3" class="circle-img">
                    </div>
                    <p class="mt-2 fw-bold" style="color: #5D737E;">Medicamentos</p>
                </a>
            </div>

        </div>
    </div>
    <div class="container mt-1">
    <div class="row">
        <!-- Tabela de Consultas -->
        <div class="col-md-6 mb-4">
            <div class="card bg-white shadow-sm rounded-lg h-100">
                <div class="card-body">
                    <h4 class="mb-4 text-center color1">Consultas agendadas <?= date('d/m/Y') ?></h4>
                    <?php if (count($consultasHoje) > 0): ?>
                        <div class="table-responsive table-rounded" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered table-striped mb-0 text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Horário</th>
                                        <th>Médico</th>
                                        <th>Especialidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($consultasHoje as $c): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($c['paciente']) ?></td>
                                            <td><?= substr($c['horario'], 0, 5) ?></td>
                                            <td><?= htmlspecialchars($c['medico']) ?></td>
                                            <td><?= htmlspecialchars($c['especialidade']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-center text-muted mt-3">Nenhuma consulta agendada para hoje.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Tabela de Medicamentos -->
        <div class="col-md-6 mb-4">
            <div class="card bg-white shadow-sm rounded-lg h-100">
                <div class="card-body">
                    <h4 class="mb-4 text-center color1">Medicação diária</h4>
                    <div class="table-responsive table-rounded" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered table-striped mb-0 text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Horário</th>
                                    <th>Medicação</th>
                                    <th>Dosagem</th>
                                    <th>Paciente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($medicamentos) > 0): ?>
                                    <?php foreach ($medicamentos as $med): ?>
                                        <tr>
                                            <td><?= htmlspecialchars(substr($med['horario'], 0, 5)) ?></td>
                                            <td><?= htmlspecialchars($med['medicacao']) ?></td>
                                            <td><?= htmlspecialchars($med['dosagem']) ?></td>
                                            <td><?= htmlspecialchars($med['paciente']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Nenhum medicamento encontrado.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<?php include_once "footer.php"; ?>