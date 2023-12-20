<?php

class DBconn
{

    public static function getConn(): PDO
    {
        return new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DB_NAME, USERNAME, Pass);
    }
}