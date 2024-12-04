<?php

class Locatario extends Model
{
  protected static $tableName = "locatarios";
  protected static $columns = [
    "id",
    "nome",
    "email",
    "telefone",
    "cep",
    "cidade",
    "estado",
    "bairro",
    "rua",
    "numero"
  ];

  public function insert()
  {
    $this->validate();
    return parent::insert();
  }

  public function update()
  {
    $this->validate();
    return parent::update();
  }

  private function validate()
  {
    $errors = [];

    if (!$this->nome) {
      $errors['nome'] = 'Nome é um campo obrigatório.';
    }

    if (!$this->email) {
      $errors['email'] = 'Email é um campo obrigatório.';
    } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Email inválido.';
    }

    if (!$this->telefone) {
      $errors['telefone'] = 'Telefone é um campo obrigatório.';
    } elseif (!preg_match('/^\+?\d{10,15}$/', $this->telefone)) {
      $errors['telefone'] = 'Telefone inválido. Deve conter entre 10 e 15 dígitos.';
    }

    if (!$this->cep) {
      $errors['cep'] = 'CEP é um campo obrigatório.';
    }

    if (!$this->cidade) {
      $errors['cidade'] = 'Cidade é um campo obrigatório.';
    }

    if (!$this->estado) {
      $errors['estado'] = 'Estado é um campo obrigatório.';
    }

    if (!$this->bairro) {
      $errors['bairro'] = 'Bairro é um campo obrigatório.';
    }

    if (!$this->rua) {
      $errors['rua'] = 'Rua é um campo obrigatório.';
    }

    if (!$this->numero) {
      $errors['numero'] = 'Número é um campo obrigatório.';
    }

    if (count($errors) > 0) {
      throw new ValidationException($errors);
    }
  }
}
