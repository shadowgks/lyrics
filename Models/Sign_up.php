<?php

class Sign_up
{
    //create
    static function add($data)
    {
        //Req Sql 1
        $stm = DB::connectDB()->prepare("SELECT * FROM `admins` 
        WHERE `email` = ?");
        $stm->execute([$data['email']]);
        $check_email = $stm->rowCount();
        //Execute sql query check num email on db
        if ($check_email > 0) {
            $_SESSION['Failed'] = "This Account Before Used!";
            header("location: Login/register.php");
        } else {
            //Upload img
            //img type
            $type = $data['picture']['type'];
            $split_type = substr($type, 6);
            //-----------------------------------------------
            //img tmp
            $tmp_picture_name     = $data['picture']['tmp_name'];
            //unique id img
            $new_unique_name      = uniqid("song.", true);
            //check picture name
            if (empty($data['picture']['name'])) {
                $distination_file = 'public/assets/imgs/pictures_upload/default/admins/default_picture.png';
            } else {
                $distination_file = 'public/assets/imgs/pictures_upload/new/admins/' . $new_unique_name . '.' . $split_type;
            }
            //Func upload picture
            move_uploaded_file($tmp_picture_name, $distination_file);
            //-----------------------------------------------

            //Req Sql 2
            $stm = DB::connectDB()->prepare("INSERT INTO `admins`(`firstName`, `lastName`, `date_birthday`, `email`, `password`, `picture`) 
            VALUES (?,?,?,?,?,?)");
            $exe = $stm->execute([$data['firstname'], $data['lastname'], $data['date_birthday'], $data['email'], $data['password'], $distination_file]);
            if ($exe) {
                return true;
            } else {
                return false;
            }
        }
    }
}
