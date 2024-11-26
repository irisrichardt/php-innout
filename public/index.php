<?php

require_once(dirname(__FILE__, 2) . "/src/config/config.php");
require_once(dirname(__FILE__, 2) . "/src/models/User.php");

// $sql = "SELECT * FROM users;";
// $result = Database::getResultFromQuery($sql);

// if ($result) {
//   while ($row = $result->fetch_assoc()) {
//     print_r($row);
//     echo "</br>";
//   }
// } else {
//   echo "Erro ao executar a consulta SQL.";
// }

$user = new User(["name" => "iris", "email" => "iris.balk@gmail.com", "password" => ""]);
$user->email = "iris2@gmail.com";
print_r($user);
echo "<br><br>";
print_r($user->name);

?>

<h1>teste</h1>
