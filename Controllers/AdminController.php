<?php

class AdminController
{

    //read
    function getAllAdmins()
    {
        $data_admins = Admin::getAll();
        return $data_admins;
    }
    //__
    function signIN()
    {
        //Check inputs form if empty
        if (
            empty($_POST['email'])
            || empty($_POST['password'])
        ) {
            $_SESSION['Failed'] = "something is wrong please try again!";
            header("location: signin");
        } else {
            $data = array(
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            );

            $read = Admin::sign_In($data);

            if ($read === true) {
                $_SESSION['Success'] = 'Hello dear ' . $_SESSION['Admin']['firstName'] . ' ' . $_SESSION['Admin']['lasrName'] . '';
                header('location:dashboard');
                die;
            } else {
                $_SESSION['Failed'] = 'Failed sign in try again';
                header('location:signin');
                die;
            }
        }
    }

    //create
    function signUpUser()
    {
        //Check inputs form if empty
        if (
            empty($_POST['firstname'])
            || empty($_POST['lastname'])
            || empty($_POST['email'])
            || empty($_POST['birthday-date'])
            || empty($_POST['password'])
            || empty($_POST['confirm-password'])
        ) {
        } else {
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'date_birthday' => $_POST['birthday-date'],
                'email' => $_POST['email'],
                'picture' => $_FILES['picture'],
                'password' => $_POST['password'],
            );

            $add = Admin::add($data);
            if ($add === true) {
                $_SESSION['Success'] = 'Created Success';
                header('location:signin');
                die;
            } else {
                $_SESSION['Failed'] = 'Something is wrong please try again!';
                header('location:signup');
                die;
            }
        }
    }
}
