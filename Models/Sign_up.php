<?php

class Sign_up{
    //create
    static function add($data)
    {
        for ($i=0; $i < count($data['name_admin']); $i++) { 
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
                $distination_file = 'public/assets/imgs/pictures/upload/default/admins/default_picture.png';
            }else{
                $distination_file = 'public/assets/imgs/pictures_upload/new/admins/'.$new_unique_name.'.'.$split_type;
            }
            //Func upload picture
            move_uploaded_file($tmp_picture_name,$distination_file);
            //-----------------------------------------------

            //Req Sql
            $stm = DB::connectDB()->prepare("INSERT INTO `songs`(`name`, `release_date`, `lyrics`, `picture`, `id_artist`, `id_cat`, `id_album`, `id_admin`) VALUES (?,?,?,?,?,?,?,?)");
            $exe = $stm->execute([$data['name_song'][$i],$data['release_date'][$i],$data['lyrics'][$i],$distination_file,$data['id_artist'][$i],$data['id_cat'][$i],$data['id_album'][$i],$data['id_admin']]);
        }
        if ($exe) {
            return true;
        } else {
            return false;
        }
    }
}
    