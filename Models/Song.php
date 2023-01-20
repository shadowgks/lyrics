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
        for ($i=0; $i < count($data['name_song']); $i++) { 
            //Upload img
            //img type
            $type = $data['picture']['type'][$i];
            $split_type = substr($type,6);
            //-----------------------------------------------
            //img tmp
            $tmp_picture_name     = $data['picture']['tmp_name'][$i];
            //unique id img
            $new_unique_name      = uniqid("song.",true);
            //check picture name
            if(empty($data['picture']['name'][$i])){
                $distination_file = 'public/assets/imgs/pictures/upload/default/songs/default_picture.png';
            }else{
                $distination_file = 'public/assets/imgs/pictures_upload/new/songs/'.$new_unique_name.'.'.$split_type;
            }
            //Func upload picture
            move_uploaded_file($tmp_picture_name,$distination_file);
            //-----------------------------------------------
            $stm = DB::connectDB()->prepare("INSERT INTO `songs`(`name`, `release_date`, `lyrics`, `picture`, `id_artist`, `id_cat`, `id_album`, `id_admin`) VALUES (?,?,?,?,?,?,?,?)");
            $exe = $stm->execute([$data['name_song'][$i],$data['release_date'][$i],$data['lyrics'][$i],$distination_file,$data['id_artist'][$i],$data['id_cat'][$i],$data['id_album'][$i],$data['id_admin']]);
        }
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
