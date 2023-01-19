<?php

class Song
{
    //read
    static function getAll()
    {
        $stm = db::connectDB()->prepare("SELECT songs.*,
        artists.name AS 'name_artist',
        categories.name AS 'name_categorie',
        albums.name as 'name_album',
        admins.firstName, admins.lastName
        FROM songs join artists join categories join admins join albums
        on songs.id_artist = artists.id 
        and songs.id_cat = categories.id
        and songs.id_album = albums.id
        and songs.id_admin = admins.id;");
        $stm->execute();
        return $stm->fetchAll();
    }

    //create
    static function add($data)
    {
        $stm = DB::connectDB()->prepare("INSERT INTO `songs`(`name`) VALUES (?)");
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
        $stm = DB::connectDB()->prepare("DELETE FROM songs WHERE id = ?");
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
        $stm = DB::connectDB()->prepare("UPDATE songs set name = ? WHERE id = ?");
        $exe = $stm->execute([$data['name'], $data['id']]);
        if ($exe) {
            return true;
        } else {
            return false;
        }
    }
}
