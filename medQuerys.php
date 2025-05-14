<?php
if (!empty($search)) {
    $sql = $pdo->prepare("
        SELECT 
            m.id,
            m.resident_id,
            r.nome AS residente,
            m.nome_medicamento,
            m.horario,
            m.dosagem,
            m.via_adm,
            m.observacoes
        FROM tb_medicamentos m
        INNER JOIN tb_residentes r ON m.resident_id = r.id
        WHERE r.nome LIKE :search OR m.nome_medicamento LIKE :search
        ORDER BY m.horario ASC
    ");
    $sql->bindValue(':search', '%' . $search . '%');
    $sql->execute();
} else {
    $sql = $pdo->query("
        SELECT 
            m.id,
            m.resident_id,
            r.nome AS residente,
            m.nome_medicamento,
            m.horario,
            m.dosagem,
            m.via_adm,
            m.observacoes
        FROM tb_medicamentos m
        INNER JOIN tb_residentes r ON m.resident_id = r.id
        ORDER BY m.horario ASC
    ");
}

$medicamentos = $sql->fetchAll(PDO::FETCH_ASSOC);

// Lógica de CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        try {
            if ($action === 'create') {
                // Cadastro de novo medicamento
                $resident_id = $_POST['resident_id'];
                $nome_medicamento = $_POST['nome_medicamento'];
                $horario = $_POST['horario'];
                $dosagem = $_POST['dosagem'];
                $via_adm = $_POST['via_adm'];
                $observacoes = $_POST['observacoes'];

                $stmt = $pdo->prepare("
                    INSERT INTO tb_medicamentos (resident_id, nome_medicamento, horario, dosagem, via_adm, observacoes)
                    VALUES (:resident_id, :nome_medicamento, :horario, :dosagem, :via_adm, :observacoes)
                ");
                $stmt->execute([
                    ':resident_id' => $resident_id,
                    ':nome_medicamento' => $nome_medicamento,
                    ':horario' => $horario,
                    ':dosagem' => $dosagem,
                    ':via_adm' => $via_adm,
                    ':observacoes' => $observacoes,
                ]);
                $_SESSION['message'] = 'Medicamento cadastrado com sucesso!';
            } elseif ($action === 'update') {
                // Atualização de medicamento
                $id = $_POST['id'];
                $resident_id = $_POST['resident_id'];
                $nome_medicamento = $_POST['nome_medicamento'];
                $horario = $_POST['horario'];
                $dosagem = $_POST['dosagem'];
                $via_adm = $_POST['via_adm'];
                $observacoes = $_POST['observacoes'];

                $stmt = $pdo->prepare("
                    UPDATE tb_medicamentos
                    SET resident_id = :resident_id, nome_medicamento = :nome_medicamento, horario = :horario,
                        dosagem = :dosagem, via_adm = :via_adm, observacoes = :observacoes
                    WHERE id = :id
                ");
                $stmt->execute([
                    ':id' => $id,
                    ':resident_id' => $resident_id,
                    ':nome_medicamento' => $nome_medicamento,
                    ':horario' => $horario,
                    ':dosagem' => $dosagem,
                    ':via_adm' => $via_adm,
                    ':observacoes' => $observacoes,
                ]);
                $_SESSION['message'] = 'Medicamento atualizado com sucesso!';
            } elseif ($action === 'delete') {
                // Exclusão de medicamento
                $id = $_POST['id'];

                $stmt = $pdo->prepare("DELETE FROM tb_medicamentos WHERE id = :id");
                $stmt->execute([':id' => $id]);
                $_SESSION['message'] = 'Medicamento excluído com sucesso!';
            }
        } catch (Exception $e) {
            $_SESSION['error'] = 'Ocorreu um erro: ' . $e->getMessage();
        }

        // Redireciona para evitar reenvio do formulário
        header("Location: listMedicamentos.php");
        exit;
    }
}
?>