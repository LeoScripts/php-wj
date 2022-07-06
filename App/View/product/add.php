<h1>Adicionar produto</h1>

<form action="/produtos/novo" method="Post">

    <label for="category_id">Categoria</label>
    <select id="category_id" name="category_id" type="text" class="form-control mb-3">
      <option selected> -- Selecione --</option>

      <?php
        while ($category = $data->fetch(\PDO::FETCH_ASSOC)) {
          extract($category);
          echo "<option value='{$code}'>{$name}</option>";
        }
      ?>
    </select>

  <label for="name">Nome</label>
  <input id="name" name="name" type="text" class="form-control mb-3">

  <label for="description">Descrição</label>
  <textarea id="description" name="description" type="text" class="form-control mb-3"></textarea>

  <label for="photo">URL da Imagem</label>
  <input id="photo" name="photo" type="text" class="form-control mb-3">

  <label for="price">Preço</label>
  <input id="price" name="price" type="text" class="form-control mb-3">

  <label for="quantity">Quantidade</label>
  <input id="quantity" name="quantity" type="text" class="form-control mb-3">

  <label for="created_at">Data de Cadastro</label>
  <input id="created_at" name="created_at" type="text" class="form-control mb-3">

</textarea>

  <button class="btn btn-primary mb-3">Cadastrar</button>
</form>
