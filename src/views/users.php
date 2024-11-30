<main class="content">
  <?php
  renderTitle(
    'Usuários',
    'Gerencie os usuários do sistema',
    'icofont-users'
  );

  include(TEMPLATE_PATH . "/messages.php");
  ?>

  <a class="btn btn-primary mb-3" href="save_user.php">
    <i class="icofont-plus me-2"></i>
    Novo Usuário
  </a>

  <table class="table text-center table-bordered table-striped table-hover">
    <thead>
      <th>Nome</th>
      <th>Email</th>
      <th>Data de Admissão</th>
      <th>Data de Desligamento</th>
      <th>Permissão</th>
      <th>Ações</th>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td class="align-middle"><?= $user->name ?></td>
          <td class="align-middle"><?= $user->email ?></td>
          <td class="align-middle"><?= $user->start_date ?></td>
          <td class="align-middle"><?= $user->end_date ?? '-' ?></td>
          <td class="align-middle">
            <?php
            $roles = [
              'admin' => 'Administrador',
              'locatario' => 'Locatário',
              'imobiliaria' => 'Imobiliária'
            ];

            echo $roles[$user->role] ?? 'Desconhecido';
            ?>
          </td>
          <td class="align-middle">
            <div class="d-flex justify-content-center gap-2">
              <a href="save_user.php?update=<?= $user->id ?>" class="btn btn-sm btn-secondary me-2"
                data-bs-toggle="tooltip" title="Editar Usuário">
                <i class="icofont-ui-edit"></i>
              </a>
              <a href="?delete=<?= $user->id ?>" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                title="Excluir Usuário">
                <i class="icofont-ui-delete"></i>
              </a>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</main>
