<?php
include_once "header.php";
include_once "dashboardSql.php";
?>

<main class="container mt-5">
    <?php if (count($consultasHoje) > 0): ?>
        <div class="card bg-white shadow-sm rounded-lg mb-5">
            <div class="card-body">
                <h3 class="mb-4 text-center color1">Consultas de <?= date('d/m/Y') ?></h3>
                <div class="table-responsive table-rounded">
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
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            Nenhuma consulta agendada para hoje.
        </div>

        <div class="card bg-white shadow-sm rounded-lg mt-4">
            <div class="card-body">
                <h4 class="mb-3 text-center" style="color: #5D737E;">Todas as Consultas</h4>
                <div class="table-responsive table-rounded">
                    <table class="table table-bordered table-striped mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Especialidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($consultasTodas as $c): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($c['data_consulta'])) ?></td>
                                    <td><?= substr($c['horario'], 0, 5) ?></td>
                                    <td><?= htmlspecialchars($c['paciente']) ?></td>
                                    <td><?= htmlspecialchars($c['medico']) ?></td>
                                    <td><?= htmlspecialchars($c['especialidade']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php include_once "footer.php" ?>