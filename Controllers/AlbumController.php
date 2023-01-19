<?php

class AlbumController
{
    function getAllAlbums()
    {
        $data_albums = Album::getAll();
        return $data_albums;
    }
    //create
    function addAlbum()
    {
        if (isset($_POST['add_categorie'])) {

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
