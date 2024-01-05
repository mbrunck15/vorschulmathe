<?php

class Belohnung
{
private int $id;
private string $belohnung;

    /**
     * @param int $id
     * @param string $belohnung
     */
    public function __construct(int $id, string $belohnung)
    {
        $this->id = $id;
        $this->belohnung = $belohnung;
    }

    public function getAllAsObjects()
    {
        $pdo = Dbconn::getConn();
        try {
            $stmt = $pdo->prepare("SELECT * FROM belohnung");
            $stmt->execute();
            $belohnung = $stmt->fetchAll(PDO::FETCH_CLASS, 'Belohnung');
            return $belohnung;
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new  Exception('Fehler!');
        }

    }
    public function getObjectById(int $id): Aufgaben
    {
        $pdo = Dbconn::getConn();
        try {
            $stmt = $pdo->prepare("SELECT * FROM belohnung WHERE id=:id");
            $stmt->bindParam('id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $m = $stmt->fetchObject('Belohnung');
            return $m;
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new  Exception('Fehler!');
        }
    }

}