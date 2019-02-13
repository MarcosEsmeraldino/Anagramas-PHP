<?php

include_once('../config.php');
include_once('../dao/AnagramaDAO.php');
include_once('../model/Anagrama.php');

if (!empty($_GET['id'])) {
	$dao = new AnagramaDAO();
	global $anagrama;
	$anagrama = $dao->getById($_GET['id']);
}

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Anagrama de Id: <?php echo $anagrama->getId(); ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Palavra:</dt>
	<dd><?php echo $anagrama->getPalavra(); ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Anagramas:</dt>
	<dd>
		<?php echo implode(", ", $anagrama->getAnagramas()); ?>
	</dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $anagrama->getId(); ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>