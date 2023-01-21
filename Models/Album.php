<?php

class Album{
    //read
    //statistic
    static function countAlbums()
    {
        $stm = db::connectDB()->prepare("SELECT count(id) AS 'count' FROM admins");
        $stm->execute();
        return $stm->fetch();
    }
    //__
    static function getAll($id_admin){
        $stm = db::connectDB()->prepare("SELECT * FROM `albums` where id_admin = $id_admin");
        $stm->execute();
        return $stm->fetchAll();
        
    }

    //create
    static function add($data){

        for($i=0; $i<count($data['name_album']); $i++){
            
            $stm = DB::connectDB()->prepare("INSERT INTO `albums`(`name`,`id_admin`) VALUES (?,?)");
            $exe = $stm->execute([$data['name_album'][$i],$data['id_admin']]);
        }
        if($exe){
            return true;
        }else{
            return false;
        }
    }

    //delete
    static function delete($id){
        $stm = DB::connectDB()->prepare("DELETE FROM albums WHERE id = ?");
        $exe = $stm->execute([$id]);
        if($exe){
            return true;
        }else{
            return false;
        }
    }

    //update
    static function update($data){
        $stm = DB::connectDB()->prepare("UPDATE albums set name = ? WHERE id = ?");
        $exe = $stm->execute([$data['name'],$data['id']]);
        if($exe){
            return true;
        }else{
            return false;
        }
    }
}