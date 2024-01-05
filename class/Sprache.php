<?php

class Sprache
{
private int $id;
private string $sprachdatei;

private string$beschreibung;

    /**
     * @param int $id
     * @param string $sprachdatei
     * @param string $beschreibung
     */
    public function __construct(int $id, string $sprachdatei, string $beschreibung)
    {
        $this->id = $id;
        $this->sprachdatei = $sprachdatei;
        $this->beschreibung = $beschreibung;
    }



    public function getId(): int
    {
        return $this->id;
    }



    public function getSprachdatei(): string
    {
        return $this->sprachdatei;
    }

    public function getBeschreibung(): string
    {
        return $this->beschreibung;
    }

    public function getAllAsObjects()
    {
        $pdo = Dbconn::getConn();
        try {
            $stmt = $pdo->prepare("SELECT * FROM spachdatei");
            $stmt->execute();
            $sprache = $stmt->fetchAll(PDO::FETCH_CLASS, 'Sprache');
            return $sprache;
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new  Exception('Fehler!');
        }
    }

    /**
     * @param int $id
     * @return Mitarbeiter|false
     */
    public function getObjectById(int $id): Sprache
    {
        $pdo = Dbconn::getConn();
        try {
            $stmt = $pdo->prepare("SELECT * FROM mitarbeiter WHERE id=:id");
            $stmt->bindParam('id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $m = $stmt->fetchObject('Mitarbeiter');
            return $m;
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new  Exception('Fehler!');
        }
    }



}