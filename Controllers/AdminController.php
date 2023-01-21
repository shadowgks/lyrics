<?php

class AdminController{
    
    //read
    function getAllAdmins(){
        $data_admins = Admin::getAll();
        return $data_admins;
    }
    //__
    function signIN(){
        //Check inputs form if empty
        if(empty($_POST['email'])
        ||empty($_POST['password'])){
            $_SESSION['Failed'] = "something is wrong please try again!";
            header("location: signin");
        }else{
            $data = array(
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            );
            
            $read = Admin::sign_In($data);

            if ($read === true) {
                $_SESSION['Success'] = '';
                header('location:dashboard');
            } else {
                $_SESSION['Failed'] = '';
                header('location:signin');
            }
        }
    }
}