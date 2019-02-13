<?php

include_once('../dao/AnagramaDAO.php');

if (isset($_GET['id'])){
	$dao = new AnagramaDAO();
	$dao->delete($_GET['id']);
  	header('location: index.php');
} else {
	die("ERRO: ID não definido.");
}

?>