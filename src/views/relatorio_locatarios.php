<main class="content">
  <?php
  renderTitle(
    'Relatório Locatários',
    'Acompanhe os registros dos locatários',
    'icofont-files-stack'
  );

  include(TEMPLATE_PATH . "/messages.php");

  $locatariosFiltrados = $locatarios;

  if (isset($_POST['search']) && !empty($_POST['search'])) {
    $estadosSelecionados = $_POST['search'];
    $locatariosFiltrados = array_filter($locatarios, function ($locatario) use ($estadosSelecionados) {
      return in_array($locatario->estado, $estadosSelecionados);
    });
  }

  $totalLocatarios = count($locatariosFiltrados);
  ?>

  <div class="alert alert-info" role="alert">
    <strong>Total de Locatários: </strong> <?= $totalLocatarios ?>
  </div>

  <div class="row g-3 mb-3 align-items-center">
    <div class="col-12 d-flex align-items-center">
      <h5 class="me-3">Locatários por Estado</h5>
      <hr class="flex-grow-1" style="border-top: 1px solid #808080;">
    </div>
  </div>

  <div class="container" style="width: 700px;">
    <div class="row d-flex justify-content-center">
      <div class="col-12 col-md-12">
        <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
          <canvas id="locatariosChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <script>
  var estados = <?= json_encode(array_column($registries, 'estado')) ?>;
  var counts = <?= json_encode(array_column($registries, 'count')) ?>;
  </script>

  <div class="bg-light p-4 mt-3 mb-3 rounded shadow-sm">
    <form class="form-login" action="" method="post">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-2">Selecione os estados</h5>
          <p class="text-muted">Escolha um ou mais estados para realizar a busca pelos locatários</p>
        </div>
        <button type="submit" class="btn btn-primary">
          Buscar
        </button>
      </div>

      <div class="border rounded p-3 mt-1" style="max-height: 150px; overflow-y: auto;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex align-items-center">
            <input class="form-check-input me-2" type="checkbox" id="checkAll" onclick="toggleSelectAll(this)"
              <?php if (isset($estadosSelecionados) && count($estadosSelecionados) == count($registries)): ?> checked
              <?php endif; ?>>
            <label class="form-check-label" for="checkAll">
              Selecionar Todos
            </label>
          </li>
          <?php foreach ($registries as $estado): ?>
          <li class="list-group-item d-flex align-items-center">
            <input class="form-check-input me-2" type="checkbox" name="search[]"
              value="<?= htmlspecialchars($estado['estado']) ?>" id="estado_<?= htmlspecialchars($estado['estado']) ?>"
              <?php if (isset($estadosSelecionados) && in_array($estado['estado'], $estadosSelecionados)): ?> checked
              <?php endif; ?>>
            <label class="form-check-label flex-grow-1" for="estado_<?= htmlspecialchars($estado['estado']) ?>">
              <?= htmlspecialchars($estado['estado']) ?>
            </label>
            <i class="icofont-location-pin text-secondary ms-auto"></i>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </form>

    <hr class="my-4">

    <div class="table-responsive card">
      <table class="table text-center table-hover table-striped">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Estado</th>
            <th>Email</th>
            <th>Telefone</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($locatariosFiltrados as $locatario): ?>
          <tr>
            <td class="align-middle"><?= htmlspecialchars($locatario->nome) ?></td>
            <td class="align-middle"><?= htmlspecialchars($locatario->estado) ?></td>
            <td class="align-middle"><?= htmlspecialchars($locatario->email) ?></td>
            <td class="align-middle"><?= htmlspecialchars($locatario->telefone) ?></td>
            <td class="align-middle"><?= htmlspecialchars($locatario->status) ?></td>
            <td class="align-middle"><?= htmlspecialchars($locatario->data_criacao) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="d-flex justify-content-end mt-3">
    <a href="javascript:void(0);" class="btn btn-success" id="exportPdfButton">
      <i class="icofont-download-alt me-2"></i> Exportar Relatório (PDF)
    </a>
  </div>
</main>
<script>
var locatarios = <?= json_encode(array_map(function($locatario) {
    return [
        'nome' => $locatario->nome,
        'estado' => $locatario->estado,
        'email' => $locatario->email,
        'telefone' => $locatario->telefone
    ];
}, $locatarios)) ?>;
var estados = <?= json_encode(array_column($registries, 'estado')) ?>;
var counts = <?= json_encode(array_column($registries, 'count')) ?>;
document.getElementById('exportPdfButton').addEventListener('click', function() {
  const {
    jsPDF
  } = window.jspdf;
  const doc = new jsPDF();
  const totalLocatarios = locatarios.length;
  doc.setFontSize(14);
  doc.text('Portal MagniCred', 105, 20, null, null, 'center');
  doc.text('Relatório de Locatários', 105, 30, null, null, 'center');
  doc.setFontSize(12);
  doc.text(`Total de Locatários: ${totalLocatarios}`, 105, 40, null, null, 'center');
  doc.text(
    '____________________________________________________________________________________',
    105, 43, null, null, 'center'
  );
  let yPosition = 50;
  const maxHeight = 250;
  const lineHeight = 10;
  const sectionHeight = 30;
  locatarios.forEach(function(locatario) {
    if (yPosition + sectionHeight > maxHeight) {
      doc.addPage();
      yPosition = 20;
    }
    doc.text(`Nome: ${locatario.nome}`, 10, yPosition);
    doc.text(`Estado: ${locatario.estado}`, 10, yPosition + lineHeight);
    doc.text(`Email: ${locatario.email}`, 10, yPosition + 2 * lineHeight);
    doc.text(`Telefone: ${locatario.telefone}`, 10, yPosition + 3 * lineHeight);
    yPosition += 4 * lineHeight;
    doc.text(
      '------------------------------------------------------------------------------------------------------------------------------',
      10, yPosition
    );
    yPosition += 10;
  });
  doc.save('relatorio_locatarios.pdf');
});
</script>
