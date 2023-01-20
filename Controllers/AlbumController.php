<?php

class AlbumController
{
    function getAllAlbums()
    {
        $data_albums = Album::getAll();
        return $data_albums;
    }

    //create
    // function addAlbum()
    // {
    //     if (isset($_POST['save_album'])) {

    //         $data = array(
    //             'name_album' => $_POST['name'],
    //         );


    //         $add = Album::add($data);
    //         if ($add === true) {
    //             // Redirect::To('home');
    //             // var_dump(Redirect::To('home.php'));

    //             // die;
    //             echo 'good';
    //             header('location:dashboard');
    //         } else {
    //             echo 'faild';
    //         }
    //     }
    // }
}
