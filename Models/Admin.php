<?php

class Admin
{
    //read
    //statistic
    static function countAdmin()
    {
        $stm = db::connectDB()->prepare("SELECT count(id) AS 'count' FROM admins");
        $stm->execute();
        return $stm->fetch();
    }
    //all admins
    static function getAll()
    {
        $stm = db::connectDB()->prepare("SELECT * FROM admins");
        $stm->execute();
        return $stm->fetchAll();
    }
    //Sign in
    static function sign_In($data)
    {
        $stm = DB::connectDB()->prepare("SELECT * FROM admins
        WHERE email = ? and password = ?");
        $stm->execute([$data['email'],$data['password']]);
        $check = $stm->rowCount();
        $data_session = $stm->fetch();
        if($check === 1){
            $_SESSION['Admin'] = $data_session;
            return true;
        }else{
            return false;
        }
    }

    
    
}