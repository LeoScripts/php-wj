<h1>Listar produtos</h1>
<a href="/produtos/novo" class="btn btn-outline-primary">Novo produto</a>
<a href="/produtos/relatorio" class="btn btn-outline-dark">Gerar PDF</a>
<table class="table table-hover table-stripred">
  <thead class="table-dark">
    <tr>
      <th>SKU</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Imagem</th>
      <th>Preço</th>
      <th>Quantidade</th>
      <th>Data de Cadastro</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while ($product = $data->fetch(PDO::FETCH_ASSOC)) {

        extract($product);

        echo '<tr>';

        echo "<td>{$sku}</td>";
        echo "<td>{$name}</td>";
        echo "<td>{$description}</td>";
        echo "<td><img width='50px' src='{$photo}'></td>";
        echo "<td>R$ {$price}</td>";
        echo "<td>{$quantity}</td>";
        echo "<td>{$created_at}</td>";

        echo "<td>
          <a href='/produtos/editar?sku={$sku}' class='btn btn-warning btn-sm'>Editar</a>
          <a href='/produtos/excluir?sku={$sku}' class='btn btn-danger btn-sm'>Excluir</a>
        </td>";

        echo '</tr>';
      }
    ?>
  </tbody>
</table>
