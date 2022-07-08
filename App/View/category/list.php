<h1>Categoria</h1>
<a href="/categorias/nova" class="btn-action">Novo Categoria</a>

<table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Code</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
      
  <tbody>
    <?php
    while ($category = $data->fetch(PDO::FETCH_ASSOC)) {
      extract($category);

      echo '<tr class="data-row">';

      echo "<td class='data-grid-td'>
        <span class='data-grid-cell-content'>{$name}</span>
      </td>";
      echo "<td class='data-grid-td'>
        <span class='data-grid-cell-content'>{$code}</span>
        
      </td>";

      echo "<td class='data-grid-td'>
        <a href='/categorias/editar?code={$code}' class='action edit'>Editar</a>
        <a href='/categorias/excluir?code={$code}' class='action edit'>Excluir</a>
      </td>";

      echo '</tr>';
    }
    ?>
  </tbody>
</table>
