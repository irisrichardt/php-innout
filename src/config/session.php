<?php

function requireValidSession($requiresAdmin = false)
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
}
