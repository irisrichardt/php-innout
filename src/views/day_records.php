<main class="content">
  <?php
  renderTitle(
    "Registrar Ponto",
    "Gerencie sua jornada de trabalho",
    "icofont-check-alt"
  );
  include(TEMPLATE_PATH . "/messages.php");
  ?>

  <div class="card">
    <div class="card-header">
      <h3 class="date"><?= $today ?></h3>
      <p class="subtitle mb-0">Registros efetuados hoje</p>
    </div>

    <div class="card-body">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th class="title">Descrição</th>
            <th class="title-hr">Horário</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <tr>
            <td>
              <div class="icon-text-container">
                <i class="icofont-tick-mark entry-icon"></i>
                <span class="text-label">Entrada 1</span>
              </div>
            </td>
            <td>
              <div class="icon-text-container">
                <i class="icofont-clock-time clock-time"></i>
                <span class="text-label"><?= $records->time1 ?? '----' ?></span>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="icon-text-container">
                <i class="icofont-runner-alt-1 exit-icon"></i>
                <span class="text-label">Saída 1 </span>
              </div>
            </td>
            <td>
              <div class="icon-text-container">
                <i class="icofont-clock-time clock-time"></i>
                <span class="text-label"><?= $records->time2 ?? '----' ?></span>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="icon-text-container">
                <i class="icofont-tick-mark entry-icon"></i>
                <span class="text-label">Entrada 2</span>
              </div>
            </td>
            <td>
              <div class="icon-text-container">
                <i class="icofont-clock-time clock-time"></i>
                <span class="text-label"><?= $records->time3 ?? '----' ?></span>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="icon-text-container">
                <i class="icofont-runner-alt-1 exit-icon"></i>
                <span class="text-label">Saída 2</span>
              </div>
            </td>
            <td>
              <div class="icon-text-container">
                <i class="icofont-clock-time clock-time"></i>
                <span class="text-label"><?= $records->time4 ?? '----' ?></span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="card-footer d-flex justify-content-center">
      <a href="innout.php" class="btn btn-success">
        <i class="icofont-check me-1"></i> Bater ponto
      </a>
    </div>
  </div>

  <form class="form-login mt-5" action="innout.php" method="post">
    <div class="input-group no-border">
      <span class="input-group-text">
        <i class="icofont-clock-time clock-time-2"></i>
      </span>
      <input type="text" name="forcedTime" class="form-control"
        placeholder="Informe a hora (hh:mm:ss) para realizar o registo manualmente"
        pattern="^([0-1][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$" title="Formato esperado: HH:MM:SS" required>
      <button class="btn btn-primary">
        Registrar ponto
      </button>
    </div>
  </form>
</main>
