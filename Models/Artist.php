<?php

class Artist{
    //read
    static function getAll(){
        $stm = db::connectDB()->prepare('SELECT * FROM artists');
        $stm->execute();
        return $stm->fetchAll();
    }

    //create
    static function add($data){
        
        
        
        for ($i=0; $i < count($data['name_artist']); $i++) { 
            //Upload img
           
            //-----------------------------------------------
            $tmp_picture_name     = $data['picture_artist'].['tmp_name'];
            //unique id img
            $new_unique_name      = uniqid(".",true);
            //check picture
            if(!empty($_FILES['picture_artist']['name'])){
                $distination_file = 'public/assets/imgs/pictures/upload/new/artists'.$new_unique_name;
            }else{
                $distination_file = 'public/assets/imgs/pictures/upload/default/artists/default_picture.png';
            }
            //Func upload picture
            move_uploaded_file($tmp_picture_name,$distination_file);
            //-----------------------------------------------

            $stm = DB::connectDB()->prepare("INSERT INTO `artists`(`name`) VALUES (?,?,?)");
            $exe = $stm->execute([$data['name_artist'][$i],$distination_file,$data['date_birthday_artist'][$i]]);
        }
        if($exe){
            return true;
        }else{
            return false;
        }
    }

    //delete
    static function delete($id){
        $stm = DB::connectDB()->prepare("DELETE FROM artists WHERE id = ?");
        $exe = $stm->execute([$id]);
        if($exe){
            return true;
        }else{
            return false;
        }
    }

    //update
    static function update($data){
        $stm = DB::connectDB()->prepare("UPDATE artists set name = ? WHERE id = ?");
        $exe = $stm->execute([$data['name'],$data['id']]);
        if($exe){
            return true;
        }else{
            return false;
        }
    }
}