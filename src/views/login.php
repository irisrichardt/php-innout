<!DOCTYPE html>
<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>In N' Out</title>
  </head>

  <body>
    <form class="form-login" action="#" method="post">
      <div class="login-card card">
        <div class="card-header p-3">
          <i class="icofont-travelling me-2"></i>
          <span class="fw-light">Registro</span>
          <span class="fw-light mx-2">de</span>
          <span class="fw-light">Ponto</span>
          <i class="icofont-runner-alt-1 ms-2"></i>
        </div>
        <div class="card-body">
          <?php include(TEMPLATE_PATH . "/messages.php") ?>
          <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
              placeholder="Informe seu email" value="<?= $email ?>">
            <div class="invalid-feedback">
              <?= $errors['email'] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="form-label mt-3">Senha</label>
            <input type="password" id="password" name="password"
              class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>" placeholder=" Informe sua senha">
            <div class="invalid-feedback">
              <?= $errors['password'] ?>
            </div>
          </div>
        </div>
        <div class="card-footer p-3">
          <button class="btn btn-primary input-group">Entrar</button>
        </div>
      </div>
    </form>
  </body>

</html>
