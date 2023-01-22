<?php

class Categorie
{
    //read
    static function getAll($id_admin)
    {
        $stm = db::connectDB()->prepare("SELECT * FROM categories 
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
        for ($i = 0; $i < count($data['name_categorie']); $i++) {
            $stm = DB::connectDB()->prepare("INSERT INTO `categories`(`name`,`id_admin`) 
            VALUES (?,?)");
            $exe = $stm->execute([$data['name_categorie'][$i],$data['id_admin']]);
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
        $stm = DB::connectDB()->prepare("UPDATE categories 
        set name = ? 
        WHERE id = ?");
        $exe = $stm->execute([$data['name_categorie'], $data['id']]);
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
            $stm = DB::connectDB()->prepare("DELETE 
            FROM categories 
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
