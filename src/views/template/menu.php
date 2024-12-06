<aside class="sidebar">
  <nav class="menu mt-3">
    <ul class="nav-list">
      <li class="nav-item">
        <a href="dashboard.php">
          <i class="icofont-home me-2"></i>
          Dashboard
        </a>
      </li>

      <?php if ($user->role === 'admin' || $user->role === 'imobiliaria'): ?>
        <li class="nav-item">
          <a href="imobiliarias.php">
            <i class="icofont-building-alt me-2"></i>
            Imobiliarias
          </a>
        </li>
        <li class="nav-item">
          <a href="relatorio_imobiliarias.php">
            <i class="icofont-file-text me-2"></i>
            Relatório Imobiliarias
          </a>
        </li>
      <?php endif ?>

      <?php if ($user->role === 'admin' || $user->role === 'locatario'): ?>
        <li class="nav-item">
          <a href="locatarios.php">
            <i class="icofont-users-alt-2 me-2"></i>
            Locatários
          </a>
        </li>
        <li class="nav-item">
          <a href="relatorio_locatarios.php">
            <i class="icofont-files-stack me-2"></i>
            Relatório Locatários
          </a>
        </li>
      <?php endif ?>
    </ul>
  </nav>

  <?php if ($user->role === 'admin'): ?>
    <div class="sidebar-widgets">
      <div class="sidebar-widget">
        <a href="users.php">
          <i class="icon icofont-users"></i>
          <div class="info">
            <span class="main">Gerenciar usuários</span>
          </div>
        </a>
      </div>
      <div class="division my-1"></div>
      <div class="sidebar-widget">
        <a href="day_records.php">
          <i class="icon icofont-clock-time"></i>
          <div class="info">
            <span class="main">Registrar ponto</span>
          </div>
        </a>
      </div>
      <div class="division my-1"></div>
      <div class="sidebar-widget">
        <a href="relatorio_geral.php">
          <i class="icon icofont-chart-histogram"></i>
          <div class="info">
            <span class="main">Relatório geral</span>
          </div>
        </a>
      </div>
    <?php endif ?>
  </div>
</aside>
