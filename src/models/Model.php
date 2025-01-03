<?php

class Model
{

  protected static $tableName = "";
  protected static $columns = [];
  protected $values = [];

  function __construct($arr, $sanitize = true)
  {
    $this->loadFromArray($arr);
  }

  public function loadFromArray($arr, $sanitize = true)
  {
    if ($arr) {
      $conn = Database::getConnection();
      foreach ($arr as $key => $value) {
        $cleanValue = $value;
        if ($sanitize && isset($cleanValue)) {
          $cleanValue = strip_tags(trim($cleanValue));
          // $cleanValue = htmlentities($cleanValue, ENT_NOQUOTES);
          $cleanValue = mysqli_real_escape_string($conn, $cleanValue);
        }
        $this->$key = $cleanValue;
      }
      $conn->close();
    }
  }

  public function __get($key)
  {
    return $this->values[$key];
  }

  public function __set($key, $value)
  {
    $this->values[$key] = $value;
  }

  public function getValues()
  {
    return $this->values;
  }

  public static function get($filters = [], $columns = '*')
  {
    $objects = [];
    $result = static::getResultSetFromSelect($filters, $columns);

    if ($result) {
      $class = get_called_class();
      while ($row = $result->fetch_assoc()) {
        array_push($objects, new $class($row));
      }
    }

    return $objects;
  }

  public static function getOne($filters = [], $columns = '*')
  {
    $class = get_called_class();
    $result = static::getResultSetFromSelect($filters, $columns);

    return $result ? new $class($result->fetch_assoc()) : null;
  }

  public static function getResultSetFromSelect($filters = [], $columns = '*')
  {
    $sql = "SELECT {$columns} FROM "
      . static::$tableName
      . static::getFilters($filters)
      . ";";

    $result = Database::getResultFromQuery($sql);

    if ($result->num_rows === 0) {
      return 0;
    } else {
      return $result;
    }
  }

  public function insert()
  {
    $columns = array_filter(static::$columns, fn($col) => $col !== 'id');

    $sql = "INSERT INTO " . static::$tableName . " ("
      . implode(",", $columns) . ") VALUES (";

    foreach ($columns as $col) {
      $sql .= static::getFormatedValues($this->$col) . ",";
    }

    $sql[strlen($sql) - 1] = ')';
    $id = Database::executeSQL($sql);
    $this->id = $id;
  }

  public function update()
  {
    $setClause = implode(', ', array_map(function ($col) {
      return "$col = " . static::getFormatedValues($this->$col);
    }, static::$columns));

    $sql = "UPDATE " . static::$tableName . " SET $setClause WHERE id = {$this->id}";

    Database::executeSQL($sql);
  }

  public function delete()
  {
    static::deleteById($this->id);
  }

  public static function deleteById($id)
  {
    $sql = "DELETE FROM " . static::$tableName . " WHERE id = {$id}";
    Database::executeSQL($sql);
  }

  private static function getFilters($filters): string
  {
    $sql = "";

    if (count($filters) > 0) {
      $sql .= " WHERE 1 = 1";
      foreach ($filters as $column => $value) {
        if ($column == 'raw') {
          $sql .= " AND {$value}";
        } else {
          $sql .= " AND {$column} = " . static::getFormatedValues($value);
        }
      }
    }

    return $sql;
  }

  private static function getFormatedValues($value)
  {
    if (is_null($value)) {
      return "null";
    } elseif (gettype($value) === "string") {
      return "'{$value}'";
    } else {
      return $value;
    }
  }

}
