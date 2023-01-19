<?php

class Album{
    //read
    static function getAll(){
        $stm = db::connectDB()->prepare('SELECT * FROM albums');
        $stm->execute();
        return $stm->fetchAll();
    }

    //create
    static function add($data){
        for($i=0; $i<count($data['name_gener']); $i++){
            $stm = DB::connectDB()->prepare("INSERT INTO `albums`(`name`) VALUES (?)");
            $exe = $stm->execute([$data['name_gener'][$i]]);
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