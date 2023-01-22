<?php

class Artist
{
    //read
    static function getAll($id_admin)
    {
        $stm = db::connectDB()->prepare("SELECT * FROM artists 
        where id_admin = $id_admin");
        $stm->execute();
        $data_CF = array(
            'count'     => $stm->rowCount(),
            'fetch_all' => $stm->fetchAll()
        );
        return $data_CF;
    }

    //create
    static function add($data)
    {
        for ($i = 0; $i < count($data['name_artist']); $i++) {
            //Upload img
            //img type
            $type = $data['picture']['type'][$i];
            $split_type = substr($type, 6);
            //-----------------------------------------------
            //img tmp
            $tmp_picture_name     = $data['picture']['tmp_name'][$i];
            //unique id img
            $new_unique_name      = uniqid("artist.", true);
            //check picture name
            if (empty($data['picture']['name'][$i])) {
                $distination_file = 'public/assets/imgs/pictures_upload/default/artists/default_picture.png';
            } else {
                $distination_file = 'public/assets/imgs/pictures_upload/new/artists/' . $new_unique_name . '.' . $split_type;
            }
            //Func upload picture
            move_uploaded_file($tmp_picture_name, $distination_file);
            //-----------------------------------------------

            //req sql
            $stm = DB::connectDB()->prepare("INSERT INTO artists(name,picture,date_birthday,id_admin) 
            VALUES (?,?,?,?)");
            $exe = $stm->execute([$data['name_artist'][$i], $distination_file, $data['date_birthday_artist'][$i],$data['id_admin']]);
        }
        if ($exe) {
            return true;
        } else {
            return false;
        }
    }

    //update
    static function update($data)
    {
        //Upload img
        //img type
        $type = $data['picture']['type'][0];
        $split_type = substr($type, 6);
        //-----------------------------------------------
        //img tmp
        $tmp_picture_name     = $data['picture']['tmp_name'][0];
        //unique id img
        $new_unique_name      = uniqid("artist.", true);
        //check picture name
        if (empty($data['picture']['name'][0])) {
            $stm_picture = DB::connectDB()->prepare("SELECT picture 
            FROM artists 
            where id = ?");
            $stm_picture->execute([$data['id']]);
            $data_picture = $stm_picture->fetch();
            $distination_file = $data_picture['picture'];
        } else {
            $distination_file = 'public/assets/imgs/pictures_upload/new/artists/' . $new_unique_name . '.' . $split_type;
        }
        //Func upload picture
        move_uploaded_file($tmp_picture_name, $distination_file);
        //-----------------------------------------------
        $stm = DB::connectDB()->prepare("UPDATE artists 
        set name = ?, picture = ?, date_birthday = ? 
        WHERE id = ?");
        $exe = $stm->execute([$data['name_artist'],$distination_file,$data['date_birthday_artist'], $data['id']]);
        if ($exe) {
            return true;
        } else {
            return false;
        }
    }

    //delete
    static function delete($id)
    {
        try {
            $stm = DB::connectDB()->prepare("DELETE FROM artists 
            WHERE id = ?");
            $exe = $stm->execute([$id]);
            if ($exe) {
                return true;
            } else {
                return false;
            }
        }catch (Exception $e) {
            echo 'and the error is: ',  $e->getMessage(), "\n";
        }    
    }
}
