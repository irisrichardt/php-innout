<?php
function requireValidSession($requiresAdmin = false, $requiresLocatario = false, $requiresImobiliaria = false)
{
  $user = $_SESSION['user'];

  if (!isset($user)) {
    header('Location: login.php');
    exit();
  }

  $type_user = $user->role;

  if ($requiresAdmin && $type_user !== 'admin') {
    addErrorMsg('Acesso negado!');
    header('Location: dashboard.php');
    exit();
  }

  if ($requiresLocatario && $type_user !== 'locatario' && $type_user !== 'admin') {
    addErrorMsg('Acesso negado!');
    header('Location: dashboard.php');
    exit();
  }

  if ($requiresImobiliaria && $type_user !== 'imobiliaria' && $type_user !== 'admin') {
    addErrorMsg('Acesso negado!');
    header('Location: dashboard.php');
    exit();
  }
}
