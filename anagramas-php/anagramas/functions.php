<?php

require_once('../config.php');
require_once(DBAPI);

include_once('../dao/AnagramaDAO.php');
include_once('../model/Anagrama.php');

$anagramas = null;
$anagrama = null;

function add() {

  if (!empty($_POST['palavra'])) {

    $palavra = $_POST['palavra'];

    $criacao = new DateTime();

    $anagrama = new Anagrama();
    $anagrama->setPalavra($palavra);
    $anagrama->setCriacao($criacao);

    $dao = new AnagramaDAO();
    $dao->insert($anagrama);

    header('location: index.php');
  }
}

function edit() {
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['anagrama'])) {
      $anagrama = $_POST['anagrama'];
      
      update('anagramas', $id, $anagrama);
      header('location: index.php');
    } else {
      global $anagrama;
      $anagrama = find('anagramas', $id);
    } 
  } else {
    header('location: index.php');
  }
}

function delete($id = null) {
  global $anagrama;
  $anagrama = remove('anagramas', $id);
  header('location: index.php');
}
