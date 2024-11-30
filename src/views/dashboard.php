<main class="content">
  <?php
  renderTitle(
    'Dashboard',
    'Acompanhe as últimas atualizações',
    'icofont-home'
  );
  include(TEMPLATE_PATH . "/messages.php");
  ?>
  <h1>Olá, <?= $user->name ?>!</h1>
  <?php if ($user->role === 'admin'): ?>
    <h3>Você é um administrador!</h3>
  <?php elseif ($user->role === 'locatario'): ?>
    <h3>Você é locatário(a)!</h3>
  <?php else: ?>
    <h3>Você é responsável pela imobialiaria!</h3>
  <?php endif; ?>
</main>
