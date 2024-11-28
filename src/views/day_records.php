<main class="content">
  <?php
  include(TEMPLATE_PATH . "/messages.php");
  ?>
  <div class="content-title mb-4">
    <i class="icon icofont-check-alt mx-4"></i>
    <div>
      <div>
        <h1>Registrar Ponto</h1>
        <h2>Gerencie seu trabalho facilmente</h2>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h3><?= $today ?></h3>
      <p class="mb-0">Os batimentos efetuados hoje</p>
    </div>
    <div class="card-body">
      <div class="d-flex m-5 justify-content-around">
        <span class="record">Entrada 1: ----</span>
        <span class="record">Saída 1: ----</span>
      </div>
      <div class="d-flex m-5 justify-content-around">
        <span class="record">Entrada 2: ----</span>
        <span class="record">Saída 2: ----</span>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-center">
      <a href="innout.php" class="btn btn-success">
        <i class="icofont-check me-1"></i>
        Bater o Ponto
      </a>
    </div>
  </div>

  <form class="mt-5" action="innout.php" method="post">
    <div class="input-group no-border">
      <input type="text" name="forcedTime" class="form-control" placeholder="Informe a hora para simular o batimento">
      <button class="btn btn-danger ms-3">
        Simular Ponto
      </button>
    </div>
  </form>
</main>
