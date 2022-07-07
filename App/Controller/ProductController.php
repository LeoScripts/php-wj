<?php

declare(strict_types = 1);

namespace App\Controller;
use App\Connection\Connection;
use Dompdf\Dompdf;

class ProductController extends AbstractController
{
  public function listAction(): void
  {
    $con = Connection::getConnection();
    $result = $con->prepare('SELECT * FROM product');
    $result->execute();

    $query = "SELECT category.name
      FROM product_category
      INNER JOIN category ON (category.code = product_category.category_code)
      INNER JOIN product ON ( product.sku = product_category.product_sku AND product.name='teclado');";
    $resultCategory = $con->prepare($query);
    $resultCategory->execute();

    parent::render('product/list', $result, $resultCategory);
  }

  public function addAction(): void
  {
    $con = Connection::getConnection();

    if ($_POST) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $photo = $_POST['photo'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $createdAt = date('Y-m-d H:i:s');

      $query = "INSERT INTO product (name, description, price, photo, quantity, created_at)
      VALUES
      ('{$name}','{$description}',{$price},'{$photo}','{$quantity}','{$createdAt}')";
      $con = Connection::getConnection();
      $resultAdd = $con->prepare($query);
      $resultAdd->execute();
      echo 'Produto adcionado com sucesso';
    }

    $result = $con->prepare('SELECT * FROM category');
    $result->execute();
    parent::render('product/add', $result);
  }

  public function removeAction(): void
  {
    $sku = $_GET['sku'];
    $con = Connection::getConnection();
    $query = "DELETE FROM product WHERE sku='{$sku}'";
    $result = $con->prepare($query);
    $result->execute();

    $message = 'Produto removido com sucesso!';
    $redirect = '/produtos';

    parent::renderMessage($message, $redirect);
  }

  public function editAction(): void
  {
    $sku = $_GET['sku'];
    $con = Connection::getConnection();

    if ($_POST) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $photo = $_POST['photo'];
      $quantity = $_POST['quantity'];

      $queryUpdate = " UPDATE product SET
          name='{$name}',
          description='{$description}',
          price='{$price}',
          photo='{$photo}',
          quantity='{$quantity}'
        WHERE sku={$sku}";

      $resultUpdate = $con->prepare($queryUpdate);
      $resultUpdate->execute();

      echo 'Produto atualizado';

    }

    $query = "SELECT * FROM product WHERE sku='{$sku}'";


    $result = $con->prepare($query);
    $result->execute();

    $data = $result->fetch(\PDO::FETCH_ASSOC);

    parent::render('product/edit', $data);
  }

  public function reportAction(): void
  {

    $con = Connection::getConnection();

    //ex: 3
    // $result = $con->prepare('SELECT prod.sku, prod.name,  prod.quantity, cat.name as category FROM product prod INNER JOIN tb_category cat ON prod.category_id = cat.id');
    //ex: 2
    // $result = $con->prepare('SELECT prod.sku, prod.name, prod.quantity, cat.name as category FROM product prod, tb_category cat');
    $result = $con->prepare('SELECT prod.sku, prod.name, prod.quantity FROM product prod');
    $result->execute();

    $content = '';

    while ($product = $result->fetch(\PDO::FETCH_ASSOC)) {
      extract($product);

      $content .= "
        <tr>
          <td style='background: #a013;text-align: center;border-right: 0.01rem solid #555;padding: 0.10rem 0.5rem;'>{$sku}</td>
          <td style='background: #4452;border-right: 0.01rem solid #555;padding: 0.10rem 0.5rem;'>{$name}</td>
          <td style='background: #f953;text-align: center;padding: 0.10rem 0.5rem;'>{$quantity}</td>
        </tr>
      ";
    }

    $html = "

      <h1 style='font-family: sans-serif; text-align: center;'>Relatorios de produtos no estoque</h1>

      <table style='width:100vw;'>
        <thead style='background: #a0a3;border-right: 0.01rem solid #555;padding: 0.10rem 0.5rem;'>
          <tr>
            <th>SKU</th>
            <th>Nome</th>
            <th>Quantidade</th>
          </tr>
        </thead>
        <tbody>
          {$content}
        </tbody>
      </table>
    ";

    $pdf = new Dompdf();
    $pdf->loadHtml($html);

    $pdf->render();
    $pdf->stream();
  }
}
