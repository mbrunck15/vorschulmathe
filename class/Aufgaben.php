<?php

class Aufgaben
{
    private float $id;
    private int $wert1;
    private int $wert2;
    private int $wert3;
    private int $wert4;
    private int $wert5;
    private string $rechenart;
    private string $bild1;
    private string $bild2;
    private int $loesung1;
    private int $loesung2;
    private float $sprachdateiId;

    /**
     * @param float $id
     * @param int $wert1
     * @param int $wert2
     * @param int $wert3
     * @param int $wert4
     * @param int $wert5
     * @param string $rechenart
     * @param string $bild1
     * @param string $bild2
     * @param int $loesung1
     * @param int $loesung2
     * @param float $sprachdateiId
     */
    public function __construct(float $id, int $wert1, int $wert2, int $wert3, int $wert4, int $wert5, string $rechenart, string $bild1, string $bild2, int $loesung1, int $loesung2, float $sprachdateiId)
    {
        $this->id = $id;
        $this->wert1 = $wert1;
        $this->wert2 = $wert2;
        $this->wert3 = $wert3;
        $this->wert4 = $wert4;
        $this->wert5 = $wert5;
        $this->rechenart = $rechenart;
        $this->bild1 = $bild1;
        $this->bild2 = $bild2;
        $this->loesung1 = $loesung1;
        $this->loesung2 = $loesung2;
        $this->sprachdateiId = $sprachdateiId;
    }

    public function getAllAsObjects()
    {
        $pdo = Dbconn::getConn();
        try {
            $stmt = $pdo->prepare("SELECT * FROM aufgaben");
            $stmt->execute();
            $aufgaben = $stmt->fetchAll(PDO::FETCH_CLASS, 'Aufgaben');
            return $aufgaben;
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new  Exception('Fehler!');
        }

    }
        public function getObjectById(int $id): Aufgaben
    {
        $pdo = Dbconn::getConn();
        try {
            $stmt = $pdo->prepare("SELECT * FROM aufgaben WHERE id=:id");
            $stmt->bindParam('id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $m = $stmt->fetchObject('Aufgaben');
            return $m;
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new  Exception('Fehler!');
        }
    }


    }