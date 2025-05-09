<?php include 'db_connect.php'; ?>
<main>
    <div class="container-lg mt-5">
        <div class="row justify-content-center">
            <!-- CONSULTAS -->
            <div class="col-md-6 mb-4">
                <div class="card bg-white shadow-sm rounded-lg">
                    <div class="card-body">
                        <h4 class="mb-3 text-center">Consultas agendadas</h4>
                        <div class="table-responsive table-rounded">
                            <table class="table table-bordered table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Hora</th>
                                        <th>Paciente</th>
                                        <th>Médico</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_consultas = "SELECT horario, paciente, medico, status FROM consultas";
                                    $result = $conn->query($sql_consultas);

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $badgeClass = match (strtolower($row["status"])) {
                                                "confirmada" => "bg-success",
                                                "pendente"    => "bg-warning text-dark",
                                                "cancelada"   => "bg-danger",
                                                default       => "bg-secondary"
                                            };
                                            echo "<tr>
                                                    <td>{$row['horario']}</td>
                                                    <td>{$row['paciente']}</td>
                                                    <td>{$row['medico']}</td>
                                                    <td><span class='badge {$badgeClass}'>{$row['status']}</span></td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4' class='text-center'>Nenhuma consulta encontrada.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MEDICAMENTOS -->
            <div class="col-md-6 mb-4">
                <div class="card bg-white shadow-sm rounded-lg">
                    <div class="card-body">
                        <h4 class="mb-3 text-center">Lista de Medicamentos</h4>
                        <div class="table-responsive table-rounded">
                            <table class="table table-bordered table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Horário</th>
                                        <th>Medicação</th>
                                        <th>Dosagem</th>
                                        <th>Paciente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_medicamentos = "SELECT horario, medicamento, dosagem, paciente FROM medicamentos";
                                    $result2 = $conn->query($sql_medicamentos);

                                    if ($result2 && $result2->num_rows > 0) {
                                        while ($row = $result2->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$row['horario']}</td>
                                                    <td>{$row['medicamento']}</td>
                                                    <td>{$row['dosagem']}</td>
                                                    <td>{$row['paciente']}</td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4' class='text-center'>Nenhum medicamento encontrado.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
