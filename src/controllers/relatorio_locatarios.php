<?php
session_start();
requireValidSession(false, true, false);

$exception = null;

$user = $_SESSION['user'];

try {
  $locatarios = Locatario::get();
  $registries = Locatario::countLocatariosByEstado();
} catch (Exception $e) {
  $exception = $e->getMessage();
}

loadTemplateView('relatorio_locatarios', [
  'locatarios' => $locatarios,
  'registries' => $registries,
  'exception' => $exception
]);
