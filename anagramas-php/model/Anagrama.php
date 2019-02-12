<?php

class Anagrama
{
	private $id;
	private $palavra;
	private $criacao;
	private $modificacao;
	
	function __construct() {
	}

	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
		return $this;
	}

	function getPalavra() {
		return $this->palavra;
	}

	function setPalavra($palavra) {
		$this->palavra = $palavra;
		return $this;
	}

	function getCriacao() {
		return $this->criacao;
	}

	function setCriacao($criacao) {
		$this->criacao = "agora";// $criacao;
		return $this;
	}

	function getModificacao() {
		return $this->modificacao;
	}

	function setModificacao($modificacao) {
		$this->modificacao = "sem modificação";// $modificacao;
		return $this;
	}
}