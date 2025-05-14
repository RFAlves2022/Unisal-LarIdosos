<?php
$dataHoje = date('Y-m-d');

$sqlHoje = "
    SELECT 
        r.nome AS paciente,
        c.horario,
        c.medico,
        c.especialidade
    FROM tb_consultas c
    INNER JOIN tb_residentes r ON c.resident_id = r.id
    WHERE c.data_consulta = :hoje
    ORDER BY c.horario ASC
";

$stmtHoje = $pdo->prepare($sqlHoje);
$stmtHoje->bindParam(':hoje', $dataHoje);
$stmtHoje->execute();
$consultasHoje = $stmtHoje->fetchAll(PDO::FETCH_ASSOC);

// 2. Buscar todas as consultas (caso não haja nenhuma hoje)
$sqlTodas = "
    SELECT 
        r.nome AS paciente,
        c.data_consulta,
        c.horario,
        c.medico,
        c.especialidade
    FROM tb_consultas c
    INNER JOIN tb_residentes r ON c.resident_id = r.id
    ORDER BY c.data_consulta ASC, c.horario ASC
";

$stmtTodas = $pdo->query($sqlTodas);
$consultasTodas = $stmtTodas->fetchAll(PDO::FETCH_ASSOC);
?>