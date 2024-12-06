<?php
session_start();
requireValidSession(true);

$date = (new Datetime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);

$imobiliarias = Imobiliaria::get();
$locatarios = Locatario::get();
$users = User::get();

loadTemplateView('relatorio_geral', [
  'today' => $today,
  'imobiliarias' => $imobiliarias,
  'locatarios' => $locatarios,
  'users' => $users
]);
