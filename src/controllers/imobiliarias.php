<?php
session_start();
requireValidSession();

loadModel("Imobiliaria");

$exception = null;

if (isset($_GET['delete'])) {
  try {
    Imobiliaria::deleteById($_GET['delete']);
    addSuccessMsg('Imobiliaria excluída com sucesso.');
  } catch (Exception $e) {
    if (stripos($e->getMessage(), 'FOREIGN KEY')) {
      addErrorMsg('Não é possível excluir a imobiliária com vínculos ativos.');
    } else {
      $exception = $e;
    }
  }
}

$imobiliarias = Imobiliaria::get();

foreach ($imobiliarias as $imobiliaria) {
  $imobiliaria->responsavel = $imobiliaria->getName();
}

loadTemplateView('imobiliarias', [
  'imobiliarias' => $imobiliarias,
  'exception' => $exception
]);
