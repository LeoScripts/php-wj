<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;

class CategoryController extends AbstractController
{
  public function listAction(): void
  {

    $con = Connection::getConnection();

    $result = $con->prepare('SELECT * FROM category');
    $result->execute();

    parent::render('category/list', $result);
  }

  public function addAction(): void
  {
    if ($_POST) {
      $name = $_POST['name'];

      $query = "INSERT INTO category (name) VALUES ('{$name}')";
      $con = Connection::getConnection();

      $result = $con->prepare($query);
      $result->execute();

      echo 'Categoria cadastrada com sucesso!';
    }
    parent::render('category/add');
  }

  public function removeAction(): void
  {
    $con = Connection::getConnection();
    $code =$_GET['code'];
    $query = "DELETE FROM category WHERE code='{$code}'";

    $result = $con->prepare($query);
    $result->execute();

    $message = 'Categoria removida!';
    $redirect = '/categorias';

    parent::renderMessage($message,$redirect);
  }

  public function updateAction(): void
  {
    $code = $_GET['code'];
    $con = Connection::getConnection();

    if ($_POST) {
      $newName = $_POST['name'];

      $queryUpdate = "UPDATE category SET name='{$newName}'WHERE code='{$code}'";

      $resultUpdate = $con->prepare($queryUpdate);
      $resultUpdate->execute();

      $message = 'Categoria atualizada com sucesso!';
      $redirect = '/categorias';

      parent::renderMessage($message,$redirect);
    }

    $query = "SELECT * FROM category WHERE code='{$code}'";

    $result = $con->prepare($query);
    $result->execute();

    $data = $result->fetch(\PDO::FETCH_ASSOC);

    parent::render('category/edit', $data);
  }
}
