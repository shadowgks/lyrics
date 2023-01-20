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
        var_dump($_POST);
        die;
        //Check inputs form if empty
        if(empty($_POST['name'])){
            $_SESSION['Failed'] = "something is wrong please try again in table Songs!";
            header("location: dashboard");
        }else{
            $data = array(
                'name_album' => $_POST['name'],
            );
            $add = Album::add($data);
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
