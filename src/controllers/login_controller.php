<?php
loadModel("Login");
session_start();

$exception = null;

if (count($_POST) > 0) {
  $login = new Login($_POST);

  $postData = json_encode($_POST, JSON_PRETTY_PRINT); // Converte para JSON formatado
  file_put_contents('post_data.json', $postData . PHP_EOL, FILE_APPEND); // Salva no arquivo 'post_data.json'

  try {
    $user = $login->checkLogin();
    $_SESSION['user'] = $user;
    header("Location: dashboard");
  } catch (AppException $e) {
    $exception = $e;
  }
}

loadView("login", $_POST + ["exception" => $exception]);
