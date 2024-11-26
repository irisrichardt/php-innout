<?php
loadModel("Login");
$exception = null;

if (count($_POST) > 0) {
  $login = new Login($_POST);

  try {
    $user = $login->checkLogin();
    echo "Olá, {$user->name}! Você está logado(a)!";
  } catch (AppException $e) {
    $exception = $e;
  }
}

loadView("login", $_POST + ["exception" => $exception]);
