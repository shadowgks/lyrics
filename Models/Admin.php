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

    //Sign in
    static function sign_In($data)
    {
        $stm = DB::connectDB()->prepare("SELECT * FROM `admins` 
        WHERE email = ? and password = ?");
        $stm->execute([$data['email'],$data['password']]);
        $check = $stm->rowCount();
        $data_session = $stm->fetch();
        $_SESSION['Admin'] = $data_session;
        if($check === 1){
            $_SESSION['Admin'] = $data_session;
            return true;
        }else{
            return false;
        }
    }
}