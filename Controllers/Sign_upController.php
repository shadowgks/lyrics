<?php

class SignupController
{
    
    //create
    function signUpUser()
    {
        
        //Check inputs form if empty
        if (empty($_POST['firstname'])
            || empty($_POST['lastname'])
            || empty($_POST['email'])
            || empty($_POST['birthday-date'])
            || empty($_POST['password'])
            || empty($_POST['confirm-password'])) {
            $_SESSION['Failed'] = "Something is wrong please try again !";
            header("location: signup");
        } else {
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'date_birthday' => $_POST['birthday-date'],
                'email' => $_POST['email'],
                'picture' => $_FILES['picture'],
                'password' => $_POST['password'],
            );
            
            $add = Sign_up::add($data);
            if ($add === true) {
                $_SESSION['Success'] = '';
                header('location:signin');
            } else {
                $_SESSION['Failed'] = '';
                header('location:signup');
            }
        }
    }
}
