<?php

class CategorieController
{
    //read
    function getAllCategorie()
    {
        $id_admin = $_SESSION['Admin']['id'];
        $data_categorie = Categorie::getAll($id_admin);
        return $data_categorie;
    }
    
    //create
    function addCategorie()
    {
        $id_admin = $_SESSION['Admin']['id'];
        //Check inputs form if empty
        if(empty($_POST['name'])){
            $_SESSION['Failed'] = "Something is wrong please try again in table Categories!";
            header("location: dashboard");
        }else{
            $data = array(
                'name_categorie' => $_POST['name'],
                'id_admin' => $id_admin,
            );
            $add = Categorie::add($data);
            if ($add === true) {
                $_SESSION['Success'] = '';
                header('location:dashboard');
            } else {
                $_SESSION['Failed'] = '';
                header('location:dashboard');
            }
        }
    }

    //update
    function updateCategorie()
    {
        //Check inputs form if empty
        if(empty($_POST['name'])){
            $_SESSION['Failed'] = "something is wrong please try again in table Songs!";
            header("location: dashboard");
        }else{
            $data = array(
                'id'                => $_POST['id'],
                'name_categorie'    => $_POST['name'][0],
            );
            $add = Categorie::update($data);
            if ($add === true) {
                $_SESSION['Success'] = '';
                header('location:dashboard');
            } else {
                $_SESSION['Failed'] = '';
                header('location:dashboard');
            }
        }
    }

    //delete
    function deleteCategorie()
    {
        //Check inputs form if empty
        if(empty($_POST['name'])){
            $_SESSION['Failed'] = "something is wrong please try again in table Songs!";
            header("location: dashboard");
        }else{
            $data = array(
                'id'                => $_POST['id'],
                'name_categorie'    => $_POST['name'][0],
            );
            $add = Categorie::delete($data);
            if ($add === true) {
                $_SESSION['Success'] = '';
                header('location:dashboard');
            } else {
                $_SESSION['Failed'] = '';
                header('location:dashboard');
            }
        }
    }
}
