<?php

class SongController{
    //read
    function getAllSongs(){
        $id_admin = $_SESSION['Admin']['id'];
        $data_songs = Song::getAll($id_admin);
        return $data_songs;
    }
    //__
    function getOneSongs(){
            $id_admin = $_SESSION['Admin']['id'];
            $id_song = $_SESSION['song_id'];
            $data_songs = Song::getOneSongs($id_admin,$id_song);
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
                $_SESSION['Success'] = 'Added Song Success';
                header('location:dashboard');
                die;
            } else {
                $_SESSION['Failed'] = 'Added Song Failed';
                header('location:dashboard');
                die;
            }
        }
    }

    //update
    function updateSong()
    {
        //Check inputs form if empty
        if(empty($_POST['name'])){
            $_SESSION['Failed'] = "something is wrong please try again in table Songs!";
            header("location: dashboard");
        }else{
            $data = array(
                'id'            => $_POST['id'],
                'name_song'     => $_POST['name'][0],
                'release_date'  => $_POST['release_date'][0],
                'lyrics'        => $_POST['lyrics'][0],
                'picture'       => $_FILES['picture'],
                'id_artist'     => $_POST['artist'][0],
                'id_cat'        => $_POST['categorie'][0],
                'id_album'      => $_POST['album'][0],
            );
            $add = Song::update($data);
            if ($add === true) {
                $_SESSION['Success'] = 'Updated Song Success';
                header('location:dashboard');
                die;
            } else {
                $_SESSION['Failed'] = 'Updated Song Failed';
                header('location:dashboard');
                die;
            }
        }
    }

    //delete
    function deleteSong()
    {
        $add = Song::delete($_POST['id']);
        if ($add === true) {
            $_SESSION['Success'] = 'Deleted Song Success';
            header('location:dashboard');
            die;
        } else {
            $_SESSION['Failed'] = 'Deleted Song Failed Because in The Table Songs!';
            header('location:dashboard');
            die;
        }
    }
}