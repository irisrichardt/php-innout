<main class="content">
  <?php

  if ($imobiliariaData['id']) {
    $id = $imobiliariaData['id'] ?? '';
    $nome = $imobiliariaData['nome'] ?? '';
    $email = $imobiliariaData['email'] ?? '';
    $telefone = $imobiliariaData['telefone'] ?? '';
    $user_id = $imobiliariaData['user_id'] ?? '';
    $cep = $imobiliariaData['cep'] ?? '';
    $cidade = $imobiliariaData['cidade'] ?? '';
    $estado = $imobiliariaData['estado'] ?? '';
    $bairro = $imobiliariaData['bairro'] ?? '';
    $rua = $imobiliariaData['rua'] ?? '';
    $numero = $imobiliariaData['numero'] ?? '';
  }

  renderTitle(
    $id ? 'Editar Imobiliária' : 'Cadastrar Imobiliária',
    $id ? 'Altere as informações da imobiliária' : 'Preencha o formulário para cadastrar uma nova imobiliária',
    'icofont-building-alt'
  );

  include(TEMPLATE_PATH . "/messages.php");
  ?>

  <form action="#" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">

    <div class="row g-3 mb-3 align-items-center">
      <div class="col-12 d-flex align-items-center">
        <h5 class="me-3">Informações da Imobiliária</h5>
        <hr class="flex-grow-1" style="border-top: 1px solid #808080;">
      </div>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-12 col-sm-6">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Informe o nome da imobiliária"
          class="form-control <?= $errors['nome'] ? 'is-invalid' : '' ?>" value="<?= $nome ?>">
        <div class="invalid-feedback">
          <?= $errors['nome'] ?>
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
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" id="telefone" name="telefone" placeholder="Informe o telefone"
          class="form-control <?= $errors['telefone'] ? 'is-invalid' : '' ?>" value="<?= $telefone ?>">
        <div class="invalid-feedback">
          <?= $errors['telefone'] ?>
        </div>
      </div>

      <div class="col-12 col-sm-6">
        <label for="responsavel" class="form-label">Responsável</label>
        <select id="responsavel" name="user_id" class="form-select <?= $errors['user_id'] ? 'is-invalid' : '' ?>">
          <option value="">Selecione um responsável</option>
          <?php foreach ($users as $user): ?>
            <option value="<?= $user['id'] ?>" <?= $user['id'] == $user_id ? 'selected' : '' ?>>
              <?= htmlspecialchars($user['name']) ?>
            </option>
          <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
          <?= $errors['user_id'] ?>
        </div>
      </div>
    </div>

    <div class="row g-3 mt-4 mb-3 align-items-center">
      <div class="col-12 d-flex align-items-center">
        <h5 class="me-3">Endereço</h5>
        <hr class="flex-grow-1" style="border-top: 1px solid #808080;">
      </div>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-12 col-sm-6">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" id="cep" name="cep" placeholder="Informe o CEP"
          class="form-control <?= $errors['cep'] ? 'is-invalid' : '' ?>" value="<?= $cep ?>" maxlength="9">
        <div class="invalid-feedback" id="cepError">
          <?= $errors['cep'] ?>
        </div>
      </div>

      <div class="col-12 col-sm-6">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" id="cidade" name="cidade" placeholder="Informe a cidade"
          class="form-control <?= $errors['cidade'] ? 'is-invalid' : '' ?>" value="<?= $cidade ?>">
        <div class="invalid-feedback">
          <?= $errors['cidade'] ?>
        </div>
      </div>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-12 col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" id="estado" name="estado" placeholder="Informe o estado"
          class="form-control <?= $errors['estado'] ? 'is-invalid' : '' ?>" value="<?= $estado ?>">
        <div class="invalid-feedback">
          <?= $errors['estado'] ?>
        </div>
      </div>

      <div class="col-12 col-sm-6">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" id="bairro" name="bairro" placeholder="Informe o bairro"
          class="form-control <?= $errors['bairro'] ? 'is-invalid' : '' ?>" value="<?= $bairro ?>">
        <div class="invalid-feedback">
          <?= $errors['bairro'] ?>
        </div>
      </div>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-12 col-sm-6">
        <label for="rua" class="form-label">Rua</label>
        <input type="text" id="rua" name="rua" placeholder="Informe a rua"
          class="form-control <?= $errors['rua'] ? 'is-invalid' : '' ?>" value="<?= $rua ?>">
        <div class="invalid-feedback">
          <?= $errors['rua'] ?>
        </div>
      </div>

      <div class="col-12 col-sm-6">
        <label for="numero" class="form-label">Número</label>
        <input type="text" id="numero" name="numero" placeholder="Informe o número"
          class="form-control <?= $errors['numero'] ? 'is-invalid' : '' ?>" value="<?= $numero ?>">
        <div class="invalid-feedback">
          <?= $errors['numero'] ?>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-between mt-5">
      <button class="btn btn-primary">
        <i class="icofont-check me-2"></i>Salvar
      </button>
      <a href="/imobiliarias.php" class="btn btn-secondary">
        Cancelar
      </a>
    </div>
  </form>
</main>

<script>
  document.getElementById('cep').addEventListener('blur', async function () {
    const cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
      try {
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();
        if (!data.erro) {
          document.getElementById('rua').value = data.logradouro || '';
          document.getElementById('bairro').value = data.bairro || '';
          document.getElementById('cidade').value = data.localidade || '';
          document.getElementById('estado').value = data.uf || '';
        } else {
          console.log('CEP não encontrado.');
        }
      } catch (error) {
        console.log('Erro ao buscar CEP:', error);
      }
    }
  });
</script>

<style>
  #cepError {
    display: none;
  }
</style>
