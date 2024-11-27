<!DOCTYPE html>
<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="icon" href="assets/img/search-property.ico" type="image/x-icon">
    <title>Portal MagniCred | Login</title>
  </head>

  <body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <form class="form-login" action="#" method="post"">
        <div class=" login-card card shadow-lg">
        <div class="card-header text-center p-4">
          <span class="fw-light me-2">Portal</span>
          <span class="fw-light">Magni</span>
          <span class="fw-semibold">Cred</span>
          <i class="icofont-search-property ms-2"></i>
        </div>
        <div class="card-body p-4">
          <?php include(TEMPLATE_PATH . "/messages.php") ?>
          <?php if (!empty($errors['email']) || !empty($errors['password'])): ?>
            <div class="alert alert-danger" role="alert">
              <strong>Erro!</strong> Verifique os campos e tente novamente.
            </div>
          <?php endif; ?>

          <div class="form-group mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
              placeholder="Informe seu e-mail" value="<?= $email ?>">
            <div class="invalid-feedback">
              <?= $errors['email'] ?>
            </div>
          </div>

          <div class="form-group mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" id="password" name="password"
              class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>" placeholder="Informe sua senha">
            <div class="invalid-feedback">
              <?= $errors['password'] ?>
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="#" class="text-decoration-none">Criar nova conta</a>
            <button class="btn btn-primary">Entrar</button>
          </div>
        </div>
    </div>
    </form>
    </div>
  </body>

</html>
