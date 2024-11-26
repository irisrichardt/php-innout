<?php

class Database
{
  public static function getConnection()
  {
    $envPath = realpath(dirname(__FILE__) . "/../env.ini");
    $env = parse_ini_file($envPath);

    $conn = mysqli_connect($env['host'], $env['username'], $env['password'], $env['database']);

    if ($conn->connect_error) {
      die("Erro: " . $conn->connect_error);
    }

    return $conn;
  }

  public static function getResultFromQuery($sql)
  {
    $conn = self::getConnection();
    $result = $conn->query($sql);
    $conn->close();
    return $result;
  }
}

// class Database
// {
//   // Método para obter a conexão
//   public static function getConnection()
//   {
//     // Caminho do arquivo .ini
//     $envPath = realpath(dirname(__FILE__) . "/../env.ini");

//     // Carregar as configurações do arquivo .ini
//     $env = parse_ini_file($envPath);

//     // Criar a string de conexão
//     $db_server = $env['host'] . ":" . $env['port'];
//     $db_user = $env['username'];
//     $db_pass = $env['password'];
//     $db_name = $env['database'];

//     // Estabelecer a conexão
//     $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

//     // Verificar erro na conexão
//     if (!$conn) {
//       die("Erro de conexão: " . mysqli_connect_error());
//     }

//     return $conn;
//   }

//   // Método para executar uma consulta e retornar o resultado
//   public static function getResultFromQuery($sql)
//   {
//     $conn = self::getConnection();
//     $result = mysqli_query($conn, $sql);

//     if (!$result) {
//       die("Erro na consulta: " . mysqli_error($conn));
//     }

//     return $result;
//   }
// }
?>
