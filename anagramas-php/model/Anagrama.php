<?php

class Anagrama
{
	private $id;
	private $palavra;
	private $criacao;
	private $modificacao;
	
	public function __construct() {
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function getPalavra() {
		return $this->palavra;
	}

	public function setPalavra($palavra) {
		$this->palavra = $palavra;
		return $this;
	}

	public function getCriacao() {
		return $this->criacao;
	}

	public function setCriacao($criacao) {
		$this->criacao = $criacao;
		return $this;
	}

	public function getModificacao() {
		return $this->modificacao;
	}

	public function setModificacao($modificacao) {
		$this->modificacao = $modificacao;
		return $this;
	}

	public function getAnagramas() {
		$str = $this->palavra;
		$n = strlen($str);
		$arr = $this->permute($str, 0, $n - 1);
		return $this->perms;
	}

	/** 
	* Baseado em:
	* https://www.geeksforgeeks.org/php-program-for-write-a-program-to-print-all-permutations-of-a-given-string/
	* permutation function 
	* @param str string to 
	* calculate permutation for 
	* @param l starting index 
	* @param r end index 
	*/
	private $perms = array();
	private function permute($str, $l, $r) {
		if ($l == $r) {
			$this->perms[] = $str;
		}
		else {
			for ($i = $l; $i <= $r; $i++) {
				$str = $this->swap($str, $l, $i);
				$this->permute($str, $l + 1, $r);
				$str = $this->swap($str, $l, $i);
			}
		}
	}

	/** 
	* Swap Characters at position 
	* @param a string value 
	* @param i position 1 
	* @param j position 2 
	* @return swapped string 
	*/
	private function swap($a, $i, $j) {
		$temp; 
		$charArray = str_split($a); 
		$temp = $charArray[$i] ; 
		$charArray[$i] = $charArray[$j]; 
		$charArray[$j] = $temp;
		return implode($charArray); 
	} 
}