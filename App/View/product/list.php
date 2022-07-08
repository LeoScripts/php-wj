<h1>Produtos</h1>
<a href="/produtos/novo" class="btn-action">Novo produto</a>
<a href="/produtos/relatorio" class="btn-action">Gerar PDF</a>
<table class="table table-hover table-stripred">
  <thead class="table-dark">
  <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">SKU</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Price</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Quantity</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Categories</span>
        </th>

        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
  </thead>
  <tbody>
    <?php
      
      while ($product = $data->fetch(PDO::FETCH_ASSOC)) {

        extract($product);

        echo '<tr class="data-row">';

        echo "<td class='data-grid-td'>
          <span class='data-grid-cell-content'>{$name}</span>
        </td>";
        echo "<td class='data-grid-td'>
          <span class='data-grid-cell-content'>{$sku}</span>
        </td>";
        echo "<td class='data-grid-td'>
          <span class='data-grid-cell-content'>{$price}</span>
        </td>";
        echo "<td class='data-grid-td'>
          <span class='data-grid-cell-content'>{$quantity}</span>
        </td>";
        echo "<td class='data-grid-td'>
          <span class='data-grid-cell-content'>categoria</span>
        </td>";
        echo "<td>
          <a href='/produtos/editar?sku={$sku}' class='btn btn-warning btn-sm'>Editar</a>
          <a href='/produtos/excluir?sku={$sku}' class='btn btn-danger btn-sm'>Excluir</a>
        </td>";
      }
    ?>
  </tbody>
</table>
