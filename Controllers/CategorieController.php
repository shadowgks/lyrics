<?php

class CategorieController
{
    function getAllCategorie()
    {
        $data_categorie = Categorie::getAll();
        return $data_categorie;
    }
    
    //create
    function addCategorie()
    {
        if(empty($_POST['name'])){
            $_SESSION['Failed'] = "Something is wrong please try again in table Categories!";
            header("location: dashboard");
        }else{
            $data = array(
                'name_categorie' => $_POST['name'],
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
}
