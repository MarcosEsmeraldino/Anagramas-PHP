<?php

include_once('../model/Anagrama.php');
include_once('../config.php');

class AnagramaDAO {

    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    public function insert(Anagrama $anagrama) {
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO anagramas (palavra, criacao, modificacao) VALUES (:palavra, :criacao, :modificacao)'
            );

            $stmt->bindValue(':palavra', $anagrama->getPalavra());
            $stmt->bindValue(':criacao', $anagrama->getCriacao());
            $stmt->bindValue(':modificacao', $anagrama->getModificacao());
            $stmt->execute();

            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
        }
    }

    public function getById($id) {
        // select a particular user by id
        $stmt = $this->conn->prepare("SELECT * FROM anagramas WHERE id=:id");
        $stmt->execute(['id' => $id]);

        if($row = $stmt->fetch(PDO::FETCH_OBJ)) {

            $a = new Anagrama();
            $a->setId($row->id);
            $a->setPalavra($row->palavra);
            $a->setCriacao($row->criacao);
            $a->setModificacao($row->modificacao);

            return $a;
        }
    }

    public function getAll() {
        $statement = $this->conn->query('SELECT * FROM anagramas');
        return $this->processResults($statement);
    }

    private function processResults($statement) {
        $results = array();

        if($statement) {

            while($row = $statement->fetch(PDO::FETCH_OBJ)) {

                $anagrama = new Anagrama();
                $anagrama->setId($row->id);
                $anagrama->setPalavra($row->palavra);
                $anagrama->setCriacao($row->criacao);
                $anagrama->setModificacao($row->modificacao);

                $results[] = $anagrama;
            }
        }

        return $results;
    }

    public function update(Anagrama $anagrama) {
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'UPDATE anagramas SET palavra = :palavra, criacao = :criacao, modificacao = :modificacao WHERE id=:id'
            );

            $stmt->bindValue(':palavra', $anagrama->getPalavra());
            $stmt->bindValue(':criacao', $anagrama->getCriacao());
            $stmt->bindValue(':modificacao', $anagrama->getModificacao());
            $stmt->bindValue(':id', $anagrama->getId());
            $stmt->execute();

            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->conn->prepare(
                'DELETE FROM anagramas WHERE id=:id'
            );

            $stmt->bindParam(':id', $id); 
            $stmt->execute();
        }
        catch(Exception $e) {
            $this->conn->rollback();
        }
    }
}