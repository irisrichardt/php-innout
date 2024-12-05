<?php
session_start();
requireValidSession(false, true, false);

$exception = null;
$locatarioData = [];

if (count($_POST) === 0 && isset($_GET['update'])) {
  $locatario = Locatario::getOne(['id' => $_GET['update']]);
  $locatarioData = $locatario->getValues();

} elseif (count($_POST) > 0) {
  try {
    $dbLocatario = new Locatario($_POST);
    if ($dbLocatario->id) {
      $dbLocatario->update();
      addSuccessMsg('Locatário alterado com sucesso!');
      header('Location: locatarios.php');
      exit();
    } else {
      $dbLocatario->insert();
      addSuccessMsg('Novo locatário cadastrado com sucesso!');
    }
    $_POST = [];
  } catch (Exception $e) {
    $exception = $e;
  } finally {
    $locatarioData = $_POST;
  }
}

loadTemplateView('save_locatario', $locatarioData + ['exception' => $exception]);
