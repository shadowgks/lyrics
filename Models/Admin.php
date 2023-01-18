<?php

class Admin
{
    //read
    static function getAll()
    {
        $stm = db::connectDB()->prepare('SELECT * FROM admins');
        $stm->execute();
        return $stm->fetchAll();
    }
}
