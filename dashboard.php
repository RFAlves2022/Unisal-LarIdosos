<?php
include_once "header.php";
?>

<main>
    <div class="container text-center mt-4 mb-3">
        <div class="row justify-content-center g-4">

            <div class="col-4 col-md-2">
                <a href="cardResidentes.php" class="text-decoration-none text-dark">
                    <div class="circle-link mx-auto">
                        <img src="img/residentes-icon.png" alt="Ícone 1" class="circle-img">
                    </div>
                    <p class="mt-2">Residentes</p>
                </a>
            </div>

            <div class="col-4 col-md-2">
                <a href="listConsultas.php" class="text-decoration-none text-dark">
                    <div class="circle-link mx-auto">
                        <img src="img/Consulta-icon.png" alt="Ícone 2" class="circle-img">
                    </div>
                    <p class="mt-2">Consultas</p>
                </a>
            </div>

            <div class="col-4 col-md-2">
                <a href="rotinaRemedio.php" class="text-decoration-none text-dark">
                    <div class="circle-link mx-auto">
                        <img src="img/medicacao-icon.png" alt="Ícone 3" class="circle-img">
                    </div>
                    <p class="mt-2">Medicamentos</p>
                </a>
            </div>

        </div>
    </div>
    <div class="container-lg mt-2 mb-5">
        <div class="row justify-content-center">
            <!-- TABELA CONSULTAS -->
            <div class="col-md-6 mb-4">
                <div class="card bg-white shadow-sm rounded-lg">
                    <div class="card-body">
                        <h4 class="mb-3 text-center" style="color: #5D737E;">Consultas do dia</h4>
                        <div class="table-responsive table-rounded">
                            <table class="table table-bordered table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Paciente</th>
                                        <th scope="col">Médico</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>08:00</td>
                                        <td>João Silva</td>
                                        <td>Dr. Carlos</td>
                                        <td><span class="badge bg-success">Confirmada</span></td>
                                    </tr>
                                    <tr>
                                        <td>09:30</td>
                                        <td>Ana Souza</td>
                                        <td>Dr. Maria</td>
                                        <td><span class="badge bg-warning text-dark">Pendente</span></td>
                                    </tr>
                                    <tr>
                                        <td>11:00</td>
                                        <td>Pedro Santos</td>
                                        <td>Dr. João</td>
                                        <td><span class="badge bg-danger">Cancelada</span></td>
                                    </tr>
                                    <tr>
                                        <td>14:00</td>
                                        <td>Lucas Oliveira</td>
                                        <td>Dr. Ana</td>
                                        <td><span class="badge bg-success">Confirmada</span></td>
                                    </tr>
                                    <tr>
                                        <td>15:30</td>
                                        <td>Mariana Lima</td>
                                        <td>Dr. Carlos</td>
                                        <td><span class="badge bg-success">Confirmada</span></td>
                                    </tr>
                                    <tr>
                                        <td>16:45</td>
                                        <td>Felipe Alves</td>
                                        <td>Dr. Maria</td>
                                        <td><span class="badge bg-warning text-dark">Pendente</span></td>
                                    </tr>
                                    <tr>
                                        <td>17:30</td>
                                        <td>Beatriz Rocha</td>
                                        <td>Dr. João</td>
                                        <td><span class="badge bg-success">Confirmada</span></td>
                                    </tr>
                                    <tr>
                                        <td>18:00</td>
                                        <td>Rafael Mendes</td>
                                        <td>Dr. Ana</td>
                                        <td><span class="badge bg-danger">Cancelada</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABELA MEDICAMENTOS -->
            <div class="col-md-6 mb-4">
                <div class="card bg-white shadow-sm rounded-lg">
                    <div class="card-body">
                        <h4 class="mb-3 text-center" style="color: #5D737E;">Rotina de Medicamentos</h4>
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
                                    <tr>
                                        <td>08:00</td>
                                        <td>Paracetamol</td>
                                        <td>500mg</td>
                                        <td>João Silva</td>
                                    </tr>
                                    <tr>
                                        <td>10:00</td>
                                        <td>Amoxicilina</td>
                                        <td>250mg</td>
                                        <td>Ana Souza</td>
                                    </tr>
                                    <tr>
                                        <td>12:30</td>
                                        <td>Dipirona</td>
                                        <td>1g</td>
                                        <td>Pedro Santos</td>
                                    </tr>
                                    <tr>
                                        <td>15:00</td>
                                        <td>Losartana</td>
                                        <td>50mg</td>
                                        <td>Lucas Oliveira</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>Ibuprofeno</td>
                                        <td>400mg</td>
                                        <td>Mariana Lima</td>
                                    </tr>
                                    <tr>
                                        <td>17:15</td>
                                        <td>Metformina</td>
                                        <td>850mg</td>
                                        <td>Felipe Alves</td>
                                    </tr>
                                    <tr>
                                        <td>18:45</td>
                                        <td>Omeprazol</td>
                                        <td>20mg</td>
                                        <td>Beatriz Rocha</td>
                                    </tr>
                                    <tr>
                                        <td>19:30</td>
                                        <td>Simvastatina</td>
                                        <td>40mg</td>
                                        <td>Rafael Mendes</td>
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<?php include_once "footer.php" ?>