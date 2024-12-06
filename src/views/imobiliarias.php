<?php

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

if ($searchTerm) {
  $filteredImobiliarias = array_filter($imobiliarias, function ($imobiliaria) use ($searchTerm) {
    $searchTerm = strtolower($searchTerm);
    return strpos(strtolower($imobiliaria->nome), $searchTerm) !== false ||
      strpos(strtolower($imobiliaria->rua), $searchTerm) !== false ||
      strpos(strtolower($imobiliaria->bairro), $searchTerm) !== false ||
      strpos(strtolower($imobiliaria->cidade), $searchTerm) !== false ||
      strpos(strtolower($imobiliaria->telefone), $searchTerm) !== false ||
      strpos(strtolower($imobiliaria->responsavel), $searchTerm) !== false ||
      strpos(strtolower($imobiliaria->email), $searchTerm) !== false;
  });
} else {
  $filteredImobiliarias = $imobiliarias;
}
?>

<main class="content">
  <?php
  renderTitle(
    'Imobiliarias',
    'Gerencie as imobiliárias do sistema',
    'icofont-building-alt'
  );
  include(TEMPLATE_PATH . "/messages.php");
  ?>

  <div class="d-flex justify-content-between align-items-center bg-light p-3 mb-3">
    <form method="GET" action="" class="d-flex w-100">
      <div class="row w-100">
        <div class="col-12 col-md-9">
          <div class="input-group">
            <span class="input-group-text bg-primary text-white">
              <i class="icofont-search"></i>
            </span>
            <input type="text" name="search" class="form-control"
              placeholder="Busque por nome, responsável, endereço, email ou telefone"
              value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
          </div>
        </div>
        <div class="col-12 col-md-3 d-flex justify-content-md-end mt-3 mt-md-0">
          <a class="btn btn-primary" href="save_imobiliaria.php">
            <i class="icofont-plus me-2"></i>
            Nova Imobiliária
          </a>
        </div>
      </div>
    </form>
  </div>

  <div class="table-responsive card">
    <table class="table text-center table-hover table-striped">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Responsável</th>
          <th>Endereço</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($filteredImobiliarias as $imobiliaria): ?>
          <tr>
            <td class="align-middle"><?= $imobiliaria->nome ?></td>
            <td class="align-middle"><?= $imobiliaria->responsavel ?></td>
            <td class="align-middle">
              <?= $imobiliaria->rua ?>, <?= $imobiliaria->numero ?>,
              <?= $imobiliaria->bairro ?>, <?= $imobiliaria->cidade ?> - <?= $imobiliaria->estado ?>
            </td>
            <td class="align-middle"><?= $imobiliaria->email ?></td>
            <td class="align-middle"><?= $imobiliaria->telefone ?></td>
            <td class="align-middle">
              <div class="d-flex justify-content-center gap-2">
                <a href="save_imobiliaria.php?update=<?= $imobiliaria->id ?>" class="btn btn-sm btn-secondary me-2"
                  data-bs-toggle="tooltip" title="Editar Imobiliária">
                  <i class="icofont-ui-edit"></i>
                </a>
                <a href="?delete=<?= $imobiliaria->id ?>" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                  title="Excluir Imobiliária">
                  <i class="icofont-ui-delete"></i>
                </a>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>

<style>
  .table td:not(:last-child),
  .table th:not(:last-child) {
    border-right: 1px solid #ddd;
  }
</style>
