<main class="content">
  <?php
  renderTitle(
    'Cadastro de usuário',
    'Preencha o formulário para cadastrar um novo usuário',
    'icofont-user'
  );

  include(TEMPLATE_PATH . "/messages.php");
  ?>

  <form action="#" method="post">
    <!-- <input type="hidden" name="id" value="<?= $id ?>"> -->

    <div class="row g-3 mb-3">
      <div class="col-12 col-sm-6">
        <label for="name" class="form-label">Nome</label>
        <input type="text" id="name" name="name" placeholder="Informe o nome"
          class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>" value="<?= $name ?>">
        <div class="invalid-feedback">
          <?= $errors['name'] ?>
        </div>
      </div>

      <div class="col-12 col-sm-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Informe o email"
          class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>" value="<?= $email ?>">
        <div class="invalid-feedback">
          <?= $errors['email'] ?>
        </div>
      </div>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-12 col-sm-6">
        <label for="password" class="form-label">Senha</label>
        <input type="password" id="password" name="password" placeholder="Informe a senha"
          class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
          <?= $errors['password'] ?>
        </div>
      </div>

      <div class="col-12 col-sm-6">
        <label for="confirm_password" class="form-label">Confirmação de senha</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme a senha"
          class="form-control <?= $errors['confirm_password'] ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
          <?= $errors['confirm_password'] ?>
        </div>
      </div>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-12 col-sm-6">
        <label for="start_date" class="form-label">Data de admissão</label>
        <input type="date" id="start_date" name="start_date"
          class="form-control <?= $errors['start_date'] ? 'is-invalid' : '' ?>" value="<?= $start_date ?>">
        <div class="invalid-feedback">
          <?= $errors['start_date'] ?>
        </div>
      </div>

      <div class="col-12 col-sm-6">
        <label for="end_date" class="form-label">Data de desligamento</label>
        <input type="date" id="end_date" name="end_date"
          class="form-control <?= $errors['end_date'] ? 'is-invalid' : '' ?>" value="<?= $end_date ?>">
        <div class="invalid-feedback">
          <?= $errors['end_date'] ?>
        </div>
      </div>
    </div>

    <hr class="my-4">

    <div class="mb-3">
      <label class="form-label">
        <i class="icofont-id-card me-2"></i>
        Permissão do usuário
      </label>
      <div>
        <select class="form-select <?= $errors['role'] ? 'is-invalid' : '' ?>" name="role" id="role">
          <option value="" disabled <?= empty($role) ? 'selected' : '' ?>>Selecione a opção</option>
          <option value="admin" <?= $role === 'admin' ? 'selected' : '' ?>>Administrador</option>
          <option value="locatario" <?= $role === 'locatario' ? 'selected' : '' ?>>Locatário</option>
          <option value="imobiliaria" <?= $role === 'imobiliaria' ? 'selected' : '' ?>>Imobiliária</option>
        </select>
        <?php if ($errors['role']): ?>
          <div class="invalid-feedback">
            <?= $errors['role'] ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="d-flex justify-content-between mt-5">
      <button class="btn btn-primary">
        <i class="icofont-check me-2"></i>Salvar
      </button>
      <a href="/users.php" class="btn btn-secondary">
        Cancelar
      </a>
    </div>
  </form>
</main>
