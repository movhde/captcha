<?php

require_once '../config.php';

use PDO, PDOException;

class Connection
{
  public static function make($host, $db, $user, $password)
  {
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    try {
      $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

      return new PDO($dsn, $user, $password, $options);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}

return Connection::make($host, $db, $username, $pass);
