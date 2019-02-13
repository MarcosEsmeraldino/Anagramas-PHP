<?php 

include_once('../config.php');
include_once('../dao/AnagramaDAO.php');
include_once('../model/Anagrama.php');

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $dao = new AnagramaDAO();

  if (isset($_POST['palavra'])) {

    $palavra = $_POST['palavra'];
    $criacao = $_POST['criacao'];
    $modificacao = date('Y-m-d H:i:s');

    $anagrama = new Anagrama();
    $anagrama->setId($id);
    $anagrama->setCriacao($criacao);
    $anagrama->setModificacao($modificacao);
    $anagrama->setPalavra($palavra);

    $dao->update($anagrama);
    header('location: index.php');

  } else {
    global $anagrama;
    $anagrama = $dao->getById($id);
  } 
} else {
  header('location: index.php');
}

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $anagrama->getId(); ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Palavra</label>
      <input type="text" class="form-control" name="palavra" value="<?php echo $anagrama->getPalavra(); ?>">
    </div>
  </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <input type="hidden" name="criacao" value="<?php echo $anagrama->getCriacao(); ?>">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>