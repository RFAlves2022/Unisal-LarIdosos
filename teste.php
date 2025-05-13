<?php include_once "header.php" ?>
<?php include_once "dbConnection.php" ?>

<main class="container">
    <!-- Botão que ativa o modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#infoModal">
  Ver informações
</button>
<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLabel">Informações do Residente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      
      <div class="modal-body">
        <!-- Aqui vão as informações -->
        <p><strong>Nome:</strong> João da Silva</p>
        <p><strong>Quarto:</strong> 204</p>
        <p><strong>Medicamentos:</strong> Aspirina, Insulina</p>
        <p><strong>Responsável:</strong> Maria da Silva - (11) 99999-8888</p>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
      
    </div>
  </div>
</div>


</main>

<?php include_once "footer.php" ?>