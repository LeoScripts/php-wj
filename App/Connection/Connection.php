<?php

declare(strict_types=1);

namespace App\Connection;

use PDO;
abstract class Connection
{
  public static function getConnection(): PDO
  {
    // $db_host = getenv('DB_HOST');
    // $db_name = getenv('DB_NAME');
    // $db_user = getenv('DB_USER');
    // $db_password = getenv('DB_ROOT_PASS');

    return new PDO('mysql:host=127.0.0.1;dbname=webjump','root','123456');
  }
}
