<?php

class AlbumController
{
    //read
    function count(){
        $count_albums = Album::countAlbums();
        return $count_albums;
    }
    //__
    function getAllAlbums()
    {
        $id_admin = $_SESSION['Admin']['id'];
        $data_albums = Album::getAll($id_admin);
        return $data_albums;
    }

    //create
    function addAlbum()
    {
        $id_admin = $_SESSION['Admin']['id'];
        //Check inputs form if empty
        if(empty($_POST['name'])){
            $_SESSION['Failed'] = "something is wrong please try again in table Songs!";
            header("location: dashboard");
        }else{
            $data = array(
                'name_album' => $_POST['name'],
                'id_admin' => $id_admin,
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
