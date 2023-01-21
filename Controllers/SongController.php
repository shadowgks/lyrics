<?php

class SongController{
    //read
    function getAllSongs(){
        $id_admin = $_SESSION['Admin']['id'];
        $data_songs = Song::getAll($id_admin);
        return $data_songs;
    }

    //create
    function addSong()
    {
        $id_admin = $_SESSION['Admin']['id'];
        //Check inputs form if empty
        if(empty($_POST['name']) 
        || empty($_POST['release_date'])
        || empty($_POST['lyrics'])
        || empty($_POST['artist'])
        || empty($_POST['categorie'])
        || empty($_POST['album'])){
            $_SESSION['Failed'] = "Something is wrong please try again in table songs!";
            header("location: dashboard");
        }else{
            $data = array(
                'name_song' => $_POST['name'],
                'release_date' => $_POST['release_date'],
                'lyrics' => $_POST['lyrics'],
                'picture' => $_FILES['picture'],
                'id_artist' => $_POST['artist'],
                'id_cat' => $_POST['categorie'],
                'id_album' => $_POST['album'],
                'id_admin' => $id_admin,
            );
            $add = Song::add($data);
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