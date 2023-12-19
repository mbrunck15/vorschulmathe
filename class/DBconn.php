<?php

class DBconn
{

    public static function getConn(): PDO
    {
      $servername = "localhost";
        $username = "root";
       $pass = "";
        $dbname = "vorschulmathe";


        return new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DB_NAME, USERNAME, Pass);
    }
}