<?php
include_once "header.php";
$search = $_GET['search'] ?? '';

if (!empty($search)) {
  $sql = $pdo->prepare("SELECT * FROM tb_residentes WHERE nome LIKE :search ORDER BY nome ASC");
  $sql->bindValue(':search', '%' . $search . '%');
  $sql->execute();
} else {
  $sql = $pdo->query("SELECT * FROM tb_residentes ORDER BY nome ASC");
}

$residentes = $sql->fetchAll(PDO::FETCH_ASSOC);

function calcularIdade($data_nasc)
{
  $nasc = new DateTime($data_nasc);
  $hoje = new DateTime();
  return $nasc->diff($hoje)->y;
}
?>

<main class="container mt-4">
  <div class="card bg-light shadow-sm rounded-lg">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <a href="dashboard.php" class="btn text-white" style="background-color: #5D737E;">Voltar</a>
        <h2 class="mb-0 text-center flex-grow-1 color1">Residentes</h2>
      </div>
    </div>
    <div class="card-body">
      <!-- Barra de busca -->
      <form method="GET" class="mb-4">
        <div class="input-group mx-auto" style="max-width: 400px;">
          <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome..." value="<?= htmlspecialchars($search) ?>">
          <button class="btn btn-primary" type="submit" style="background-color: #5D737E;">Buscar</button>
        </div>
      </form>

      <!-- Cadastrar Novo-->
      <div class="d-flex justify-content-between align-items-center mb-3" style="max-width: 700px; margin: 0 auto;">
        <p class="mb-0 text-muted">Total de Residentes: <strong><?= count($residentes) ?></strong></p>
        <a href="frmCadResidente.php" class="color1">Cadastrar Novo</a>
      </div>

      <?php if (count($residentes) > 0): ?>
        <div class="list-group mx-auto" style="max-width: 700px;">
          <?php foreach ($residentes as $res): ?>
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-3 shadow-sm rounded"
              data-bs-toggle="modal" data-bs-target="#residenteModal"
              data-nome="<?= htmlspecialchars($res['nome']) ?>"
              data-data_nasc="<?= htmlspecialchars((new DateTime($res['data_nasc']))->format('d/m/Y')) ?>"
              data-cpf="<?= htmlspecialchars($res['cpf']) ?>"
              data-rg="<?= htmlspecialchars($res['rg']) ?>"
              data-telefone="<?= htmlspecialchars($res['telefone']) ?>"
              data-endereco="<?= htmlspecialchars($res['endereco']) ?>"
              data-email="<?= htmlspecialchars($res['email']) ?>"
              data-quarto="<?= htmlspecialchars($res['quarto']) ?>"
              data-medicamentos="<?= htmlspecialchars($res['medicamentos']) ?>"
              data-alergias="<?= htmlspecialchars($res['alergias']) ?>"
              data-restricoes_alimentares="<?= htmlspecialchars($res['restricoes_alimentares']) ?>"
              data-responsavel_nome="<?= htmlspecialchars($res['responsavel_nome']) ?>"
              data-responsavel_telefone="<?= htmlspecialchars($res['responsavel_telefone']) ?>"
              data-responsavel_email="<?= htmlspecialchars($res['responsavel_email']) ?>"
              data-parente_grau="<?= htmlspecialchars($res['parente_grau']) ?>">
              <div class="d-flex align-items-center">
                <i class="bi bi-person-circle fs-3 text-primary me-3"></i>
                <div>
                  <h6 class="mb-0"><?= htmlspecialchars($res['nome']) ?></h6>
                  <small class="text-muted">Idade: <?= calcularIdade($res['data_nasc']) ?> anos</small>
                </div>
              </div>
              <small class="text-muted">Quarto: <?= htmlspecialchars($res['quarto']) ?></small>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <div class="alert alert-warning text-center">Nenhum residente encontrado.</div>
      <?php endif; ?>
    </div>
  </div>
</main>

<div class="modal fade" id="residenteModal" tabindex="-1" aria-labelledby="residenteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="residenteModalLabel">Detalhes do Residente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nome:</strong> <span id="modal-nome"></span></p>
        <p><strong>Data de Nascimento:</strong> <span id="modal-data_nasc"></span></p>
        <p><strong>CPF:</strong> <span id="modal-cpf"></span></p>
        <p><strong>RG:</strong> <span id="modal-rg"></span></p>
        <p><strong>Telefone:</strong> <span id="modal-telefone"></span></p>
        <p><strong>Endereço:</strong> <span id="modal-endereco"></span></p>
        <p><strong>E-mail:</strong> <span id="modal-email"></span></p>
        <p><strong>Quarto:</strong> <span id="modal-quarto"></span></p>
        <p><strong>Medicamentos:</strong> <span id="modal-medicamentos"></span></p>
        <p><strong>Alergias:</strong> <span id="modal-alergias"></span></p>
        <p><strong>Restrições Alimentares:</strong> <span id="modal-restricoes_alimentares"></span></p>
        <p><strong>Nome do Responsável:</strong> <span id="modal-responsavel_nome"></span></p>
        <p><strong>Telefone do Responsável:</strong> <span id="modal-responsavel_telefone"></span></p>
        <p><strong>E-mail do Responsável:</strong> <span id="modal-responsavel_email"></span></p>
        <p><strong>Grau de Parentesco:</strong> <span id="modal-parente_grau"></span></p>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <form method="POST" action="deletarResidente.php" onsubmit="return confirm('Tem certeza que deseja deletar este residente?');">
          <input type="hidden" name="cpf" id="modal-cpf-hidden">
          <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #5D737E;">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script>
  const residenteModal = document.getElementById('residenteModal');
  residenteModal.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    const modal = residenteModal.querySelector('.modal-body');

    modal.querySelector('#modal-nome').textContent = button.getAttribute('data-nome');
    modal.querySelector('#modal-data_nasc').textContent = button.getAttribute('data-data_nasc');
    modal.querySelector('#modal-cpf').textContent = button.getAttribute('data-cpf');
    modal.querySelector('#modal-rg').textContent = button.getAttribute('data-rg');
    modal.querySelector('#modal-telefone').textContent = button.getAttribute('data-telefone');
    modal.querySelector('#modal-endereco').textContent = button.getAttribute('data-endereco');
    modal.querySelector('#modal-email').textContent = button.getAttribute('data-email');
    modal.querySelector('#modal-quarto').textContent = button.getAttribute('data-quarto');
    modal.querySelector('#modal-medicamentos').textContent = button.getAttribute('data-medicamentos');
    modal.querySelector('#modal-alergias').textContent = button.getAttribute('data-alergias');
    modal.querySelector('#modal-restricoes_alimentares').textContent = button.getAttribute('data-restricoes_alimentares');
    modal.querySelector('#modal-responsavel_nome').textContent = button.getAttribute('data-responsavel_nome');
    modal.querySelector('#modal-responsavel_telefone').textContent = button.getAttribute('data-responsavel_telefone');
    modal.querySelector('#modal-responsavel_email').textContent = button.getAttribute('data-responsavel_email');
    modal.querySelector('#modal-parente_grau').textContent = button.getAttribute('data-parente_grau');

    document.getElementById('modal-cpf-hidden').value = button.getAttribute('data-cpf');
  });
</script>

<?php include_once "footer.php"; ?>