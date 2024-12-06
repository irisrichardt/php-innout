<main class="content">
  <?php
  renderTitle(
    "Relatório Geral",
    "Informações sobre usuários, locatários e imobiliárias",
    "icofont-chart-histogram"
  );
  include(TEMPLATE_PATH . "/messages.php");
  ?>

  <h3 class="text-center text-secondary mb-4"><?php echo $today; ?></h3>

  <div class="row text-center">
    <div class="col-md-4 mb-3">
      <div class="card shadow-sm bg-primary text-white">
        <div class="card-body">
          <h5 class="card-title mt-4">Usuários</h5>
          <p class="card-text display-4"><?php echo count($users); ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="card shadow-sm bg-success text-white">
        <div class="card-body">
          <h5 class="card-title mt-4">Locatários</h5>
          <p class="card-text display-4"><?php echo count($locatarios); ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="card shadow-sm bg-secondary text-white">
        <div class="card-body">
          <h5 class="card-title mt-4">Imobiliárias</h5>
          <p class="card-text display-4"><?php echo count($imobiliarias); ?></p>
        </div>
      </div>
    </div>
  </div>
</main>
