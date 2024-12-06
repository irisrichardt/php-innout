<?php
session_start();
requireValidSession(false, true, false);

loadModel("Locatario");

$exception = null;

if (isset($_GET['delete'])) {
  try {
    Locatario::deleteById($_GET['delete']);
    addSuccessMsg('Locatário excluído com sucesso.');
  } catch (Exception $e) {
    if (stripos($e->getMessage(), 'FOREIGN KEY')) {
      addErrorMsg('Não é possível excluir o locatário com vínculos ativos.');
    } else {
      $exception = $e;
    }
  }
}

$locatarios = Locatario::get();

loadTemplateView('locatarios', [
  'locatarios' => $locatarios,
  'exception' => $exception
]);
