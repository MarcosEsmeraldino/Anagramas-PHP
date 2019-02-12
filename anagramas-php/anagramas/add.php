<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Anagrama</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="nome">Cadastre uma palavra</label>
      <input type="text" class="form-control" name="palavra">
    </div>
   
   <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Voltar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>