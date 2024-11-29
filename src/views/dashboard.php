<main class="content">
  <?php
  renderTitle(
    'Dashboard',
    'Visualize os dados do sistema',
    'icofont-dashboard-web'
  );

  include(TEMPLATE_PATH . "/messages.php");
  ?>
  <h1>olá</h1>
  <?php if ($user->is_admin): ?>
    <h3>Você é um administrador!</h3>
  <?php else: ?>
    <h3>Você não tem privilégios de administrador.</h3>
  <?php endif; ?>
</main>
