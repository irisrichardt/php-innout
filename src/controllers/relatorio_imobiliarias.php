<?php
session_start();
requireValidSession(false, false, true);

$exception = null;

$user = $_SESSION['user'];

try {
  $imobiliarias = Imobiliaria::get();
  $registries = Imobiliaria::countImobiliariasByEstado();
} catch (Exception $e) {
  $exception = $e->getMessage();
}

loadTemplateView('relatorio_imobiliarias', [
  'imobiliarias' => $imobiliarias,
  'registries' => $registries,
  'exception' => $exception
]);
