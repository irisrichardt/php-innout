<?php
session_start();
requireValidSession(false, true, false);

$exception = null;

$user = $_SESSION['user'];

$registries = Locatario::countLocatariosByEstado();

try {
  $locatarios = Locatario::get();
  $locatariosByEstado = Locatario::countLocatariosByEstado();
} catch (Exception $e) {
  $exception = $e->getMessage();
}

loadTemplateView('relatorio_locatarios', [
  'locatarios' => $locatarios,
  'registries' => $registries,
  'exception' => $exception
]);
