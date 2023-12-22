<?php

class User
{
    private int $id;
    private string $name;
    private string $rolle;

    /**
     * @param int $id
     * @param string $name
     * @param string $rolle
     */
    public function __construct(int $id, string $name, string $rolle)
    {
        $this->id = $id;
        $this->name = $name;
        $this->rolle = $rolle;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getRolle(): string
    {
        return $this->rolle;
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
                echo "Erfolgreich authentifiziert!";
                $_SESSION['userId'] = $benutzer['id'];
                //  print_r( $_SESSION['userId']);
                $view = 'liste';
                // Hier könntest du eine Session starten oder andere Aktionen ausführen
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
//        echo '<pre>';
//        print_r($user);
//        echo '</pre>';

            return $user;
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new  Exception('Fehler!');
        }
    }


}