<?php

class SongController{
    function getAllSongs(){
        $data_songs = Song::getAll();
        return $data_songs;
    }

    //create
    // function addSong()
    // {
    //     if (isset($_POST['save_song'])) {

    //         $data = array(
    //             'name_song' => $_POST['name'],
    //             'name_song' => $_POST['name'],
    //             'name_song' => $_POST['name'],
    //             'name_song' => $_POST['name'],
    //         );

    //         $add = Song::add($data);
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