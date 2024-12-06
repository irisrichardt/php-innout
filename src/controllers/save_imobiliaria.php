<?php
session_start();
requireValidSession(false, false, true);

$exception = null;
$imobiliariaData = [];

$users = User::getUsersByType();

if (count($_POST) === 0 && isset($_GET['update'])) {
  $imobiliaria = Imobiliaria::getOne(['id' => $_GET['update']]);
  $responsavel = $imobiliaria->getName();
  $imobiliariaData = $imobiliaria->getValues();
  $imobiliariaData['responsavel'] = $responsavel;
} elseif (count($_POST) > 0) {
  try {
    $dbImobiliaria = new Imobiliaria($_POST);
    if ($dbImobiliaria->id) {
      $dbImobiliaria->update();
      addSuccessMsg('Imobiliária alterada com sucesso!');
      header('Location: imobiliarias.php');
      exit();
    } else {
      $dbImobiliaria->insert();
      addSuccessMsg('Nova imobiliária cadastrada com sucesso!');
    }
    $_POST = [];
  } catch (Exception $e) {
    $exception = $e;
  } finally {
    $imobiliariaData = $_POST;
  }
}

loadTemplateView('save_imobiliaria', [
  'imobiliariaData' => $imobiliariaData,
  'users' => $users,
  'exception' => $exception
]);
