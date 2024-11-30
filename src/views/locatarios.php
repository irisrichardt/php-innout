<main class="content">
  <?php
  renderTitle(
    'Locatários',
    'Gerencie os locatários do sistema',
    'icofont-users-alt-4'
  );

  include(TEMPLATE_PATH . "/messages.php");
  ?>

  <a class="btn btn-primary mb-3" href="save_locatario.php">
    <i class="icofont-plus me-2"></i>
    Novo Locatário
  </a>

  <table class="table text-center table-bordered table-striped table-hover">
    <thead>
      <th>Nome</th>
      <th>Endereço</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Ações</th>
    </thead>
    <tbody>
      <?php foreach ($locatarios as $locatario): ?>
        <tr>
          <td class="align-middle"><?= htmlspecialchars($locatario->nome) ?></td>
          <td class="align-middle"><?= htmlspecialchars($locatario->endereco) ?></td>
          <td class="align-middle"><?= htmlspecialchars($locatario->email) ?></td>
          <td class="align-middle"><?= htmlspecialchars($locatario->telefone) ?></td>
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
</main>
