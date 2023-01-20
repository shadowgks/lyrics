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
        if (isset($_POST['save_categorie'])) {

            $data = array(
                'name_categorie' => $_POST['name'],
            );

  

            $add = Categorie::add($data);
            if ($add === true) {
                // Redirect::To('home');
                // var_dump(Redirect::To('home.php'));

                // die;
                echo 'good';
                header('location:dashboard');
            } else {
                echo 'faild';
            }
        }
    }
}
