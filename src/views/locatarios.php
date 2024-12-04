<?php

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

if ($searchTerm) {
  $filteredLocatarios = array_filter($locatarios, function ($locatario) use ($searchTerm) {
    $searchTerm = strtolower($searchTerm);
    return strpos(strtolower($locatario->nome), $searchTerm) !== false ||
      strpos(strtolower($locatario->rua), $searchTerm) !== false ||
      strpos(strtolower($locatario->bairro), $searchTerm) !== false ||
      strpos(strtolower($locatario->cidade), $searchTerm) !== false ||
      strpos(strtolower($locatario->telefone), $searchTerm) !== false ||
      strpos(strtolower($locatario->email), $searchTerm) !== false;
  });
} else {
  $filteredLocatarios = $locatarios;
}
?>

<main class="content">
  <?php
  renderTitle(
    'Locatários',
    'Gerencie os locatários do sistema',
    'icofont-users-alt-4'
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
              placeholder="Busque por nome, endereço, email ou telefone"
              value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
          </div>
        </div>
        <div class="col-12 col-md-3 d-flex justify-content-md-end mt-3 mt-md-0">
          <a class="btn btn-primary" href="save_locatario.php">
            <i class="icofont-plus me-2"></i>
            Novo Locatário
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
          <th>Endereço</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($filteredLocatarios as $locatario): ?>
          <tr>
            <td class="align-middle"><?= $locatario->nome ?></td>
            <td class="align-middle">
              <?= $locatario->rua ?>, <?= $locatario->numero ?>,
              <?= $locatario->bairro ?>, <?= $locatario->cidade ?> - <?= $locatario->estado ?>
            </td>
            <td class="align-middle"><?= $locatario->email ?></td>
            <td class="align-middle"><?= $locatario->telefone ?></td>
            <td class="align-middle">
              <div class="d-flex justify-content-center gap-2">
                <a href="save_locatario.php?update=<?= $locatario->id ?>" class="btn btn-sm btn-secondary me-2"
                  data-bs-toggle="tooltip" title="Editar Locatário">
                  <i class="icofont-ui-edit"></i>
                </a>
                <a href="?delete=<?= $locatario->id ?>" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                  title="Excluir Locatário">
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
