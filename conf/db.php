<?php

    /**
     **Класс конфигурации базы данных
     */

class DB {
    const USER = "root";
    const PASS = "root";
    const HOST = "localhost";
    const DB = "Diplom1";

    public static function connToDB () {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        //$conn = new PDO("mysql:dbname=$db;host=$host;charset=UTF8", $user, $pass);
        //return $conn;
    }
}