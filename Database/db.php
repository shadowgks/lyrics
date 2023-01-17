<?php

class DB{
    private static $host = 'localhost';
    private static $nameDB = 'lyrics_songsdb';
    private static $username = 'root';
    private static $password = '';

    static function connectDB(){
        try{
            $conn = new PDO('mysql:host='.self::$host.';dbname='.self::$nameDB.';', self::$username, self::$password, 
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        }catch(Exception $e){
            die ('Filed To connect Db'.$e->getMessage());
        }
        return $conn; 
    }
}