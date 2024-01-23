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
    private string $loesungsbild1;
    private string $loesungsbild2;
    private string $loesungsbild3;
    private string $loesungsbild4;

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
     * @param string $loesungsbild1
     * @param string $loesungsbild2
     * @param string $loesungsbild3
     * @param string $loesungsbild4
     */
    public function __construct(float $id, int $wert1, int $wert2, int $wert3, int $wert4, int $wert5, string $rechenart, string $bild1, string $bild2, int $loesung1, int $loesung2, float $sprachdateiId, string $loesungsbild1, string $loesungsbild2, string $loesungsbild3, string $loesungsbild4)
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
        $this->loesungsbild1 = $loesungsbild1;
        $this->loesungsbild2 = $loesungsbild2;
        $this->loesungsbild3 = $loesungsbild3;
        $this->loesungsbild4 = $loesungsbild4;
    }

    public function getId(): float
    {
        return $this->id;
    }

    public function getWert1(): int
    {
        return $this->wert1;
    }

    public function getWert2(): int
    {
        return $this->wert2;
    }

    public function getWert3(): int
    {
        return $this->wert3;
    }

    public function getWert4(): int
    {
        return $this->wert4;
    }

    public function getWert5(): int
    {
        return $this->wert5;
    }

    public function getRechenart(): string
    {
        return $this->rechenart;
    }

    public function getBild1(): string
    {
        return $this->bild1;
    }

    public function getBild2(): string
    {
        return $this->bild2;
    }

    public function getLoesung1(): int
    {
        return $this->loesung1;
    }

    public function getLoesung2(): int
    {
        return $this->loesung2;
    }

    public function getSprachdateiId(): float
    {
        return $this->sprachdateiId;
    }

    public function getLoesungsbild1(): string
    {
        return $this->loesungsbild1;
    }

    public function getLoesungsbild2(): string
    {
        return $this->loesungsbild2;
    }

    public function getLoesungsbild3(): string
    {
        return $this->loesungsbild3;
    }

    public function getLoesungsbild4(): string
    {
        return $this->loesungsbild4;
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