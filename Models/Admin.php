<?php

class Admin
{
    //read
    static function getAll()
    {
        $stm = db::connectDB()->prepare("SELECT * FROM admins");
        $stm->execute();
        $data_CF = array(
            'count'     => $stm->rowCount(),
            'fetch_all' => $stm->fetchAll()
        );
        return $data_CF;
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