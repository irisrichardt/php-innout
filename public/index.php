<?php

require_once(dirname(__FILE__, 2) . "/src/config/config.php");
require_once(dirname(__FILE__, 2) . "/src/models/User.php");

$user = new User(["name" => "iris", "email" => "iris.balk@gmail.com", "password" => ""]);
$user->email = "iris2@gmail.com";

echo "<br><br>";

print_r(User::get(['id' => 1], 'name, email'));

echo "<br><br>";

print_r(User::get(['name' => "Ana", 'id' => 2], 'id, name, email'));

echo "<br><br>";

echo "Nome dos usuários:<br>";
foreach (User::get() as $user) {
  echo $user->id . ". " . $user->name;
  echo "<br>";
}

?>

<h1>teste</h1>
