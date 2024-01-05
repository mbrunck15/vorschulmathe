<?php

class User
{
    private int $id;
    private string $name;
    private string $passwort;
    private float $aufgabenId;
    private string $rolle;
    private float $belohnungsstand;

    /**
     * @param int $id
     * @param string $name
     * @param string $passwort
     * @param float $aufgabenId
     * @param string $rolle
     * @param float $belohnungsstand
     */
    public function __construct(int $id, string $name, string $passwort, float $aufgabenId, string $rolle, float $belohnungsstand)
    {
        $this->id = $id;
        $this->name = $name;
        $this->passwort = $passwort;
        $this->aufgabenId = $aufgabenId;
        $this->rolle = $rolle;
        $this->belohnungsstand = $belohnungsstand;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPasswort(): string
    {
        return $this->passwort;
    }

    public function getAufgabenId(): float
    {
        return $this->aufgabenId;
    }

    public function getRolle(): string
    {
        return $this->rolle;
    }

    public function getBelohnungsstand(): float
    {
        return $this->belohnungsstand;
    }


    public static function checkLogin(string $name, string $passwort): string
    {
        $pdo = Dbconn::getConn();
        $stmt = $pdo->prepare("SELECT id, name, rolle FROM user WHERE name=:name");
        $stmt->bindParam('name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $benutzer = $stmt->fetch(PDO::FETCH_ASSOC);


        if (is_array($benutzer)) {

            $hashed_password = $benutzer['passwort'];

            // Überprüfe das Passwort mit password_verify()
            if (password_verify($passwort, $hashed_password)) {
                // Passwort ist korrekt, Authentifizierung erfolgreich
                echo "Herzlich willkommen!";
                $_SESSION['userId'] = $benutzer['id'];
                $view = 'liste';

            } else {
                // Passwort ist inkorrekt, Authentifizierung fehlgeschlagen
                echo "Ungültige Anmeldeinformationen!";

                $view = 'login';
            }
        } else {
            // Benutzer nicht gefunden
            echo "Benutzer nicht gefunden!";
            $view = 'login';
        }
        return $view;

    }

    public function getObjectById(int $id): User
    {

        $pdo = Dbconn::getConn();

        try {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE id=:id");
            $stmt->bindParam('id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetchObject('User');
            return $user;
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new  Exception('Fehler!');
        }
    }
    public function updateObject(): void
    {
        $pdo = Dbconn::getConn();
        try {
            $stmt = $pdo->prepare("UPDATE user SET name=:name, passwort=:passwort, aufgabenId=:aufgabenId WHERE id=:id");
            $stmt->bindParam('id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam('name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam('passwort', $this->passwort, PDO::PARAM_STR);
            $stmt->bindParam('aufgabenId', $this->aufgabenId, PDO::PARAM_INT);
            $stmt->bindParam('rolle',$this->rolle,PDO::PARAM_STR);
            $stmt->bindParam('belohnungsstand',$this->belohnungsstand,PDO::PARAM_STR);
            echo $this->aufgabenId;
            $stmt->execute();

        } catch (Exception $e) {
            echo $e->getMessage();
            throw new  Exception('Fehler!');
        }
    }
}