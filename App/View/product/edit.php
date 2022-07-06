<h1>Editar produto</h1>

<?php extract($data); ?>

<form action="" method="Post">

    <label for="category-id">Categoria</label>
    <select  id="category_id" name="category_id" type="text" class="form-control mb-3">
      <option selected> -- Selecione --</option>
      <option value="1">Eletronicos</option>
      <option value="2" >Informatica</option>
      <option value="3" >Papelaria</option>

    </select>

  <label for="name">Nome</label>
  <input value="<?php echo $data['name']; ?>" id="name" name="name" type="text" class="form-control mb-3">

  <label for="description">Descrição</label>
  <textarea  id="description" name="description" type="text" class="form-control mb-3"><?php echo $data['description']; ?></textarea>

  <label for="photo">Imagem</label>
  <input value="<?php echo $data['photo']; ?>" id="photo" name="photo" type="text" class="form-control mb-3">

  <label for="price">Preço</label>
  <input value="<?php echo $data['price']; ?>" id="price" name="price" type="text" class="form-control mb-3">

  <label for="quantity">Quantidade</label>
  <input value="<?php echo $data['quantity']; ?>" id="quantity" name="quantity" type="text" class="form-control mb-3">

  <label for="created_at">Data de Cadastro</label>
  <input id="created_at" name="created_at" type="text" class="form-control mb-3"<?php echo $data['created_at']; ?></textarea>

  <button class="btn btn-primary mb-3">Atualizar</button>
</form>
