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

    //create
    static function add($data)
    {
        $stm = DB::connectDB()->prepare("INSERT INTO admins(name) VALUES (?)");
        $exe = $stm->execute([$data['name']]);
        if ($exe) {
            return true;
        } else {
            return false;
        }
    }

    //delete
    static function delete($id)
    {
        $stm = DB::connectDB()->prepare("DELETE FROM admins WHERE id = ?");
        $exe = $stm->execute([$id]);
        if ($exe) {
            return true;
        } else {
            return false;
        }
    }

    //update
    static function update($data)
    {
        $stm = DB::connectDB()->prepare("UPDATE admins set name = ? WHERE id = ?");
        $exe = $stm->execute([$data['name'], $data['id']]);
        if ($exe) {
            return true;
        } else {
            return false;
        }
    }
}
