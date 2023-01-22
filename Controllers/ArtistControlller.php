<?php

class ArtistController{
    //read
    function getAllArtists(){
            $id_admin = $_SESSION['Admin']['id'];
            $data_artists = Artist::getAll($id_admin);
            return $data_artists;
    }

    //create
    function addArtist()
    {
        $id_admin = $_SESSION['Admin']['id'];
        //Check inputs form if empty
        if(empty($_POST['name'])
        || empty($_POST['birthday_date'])){
            $_SESSION['Failed'] = "Something is wrong please try again in table Categories!";
            header("location: dashboard");
        }else{
            $data = array(
                'name_artist' => $_POST['name'],
                'picture' => $_FILES['picture'],
                'date_birthday_artist' => $_POST['birthday_date'],
                'id_admin' => $id_admin,
            );
            $add = Artist::add($data);
            if ($add === true) {
                $_SESSION['Success'] = '';
                header('location: dashboard');
            } else {
                $_SESSION['Failed'] = '';
                header('location: dashboard');
            }
        }
    }

    //update
    function updateAlbum()
    {
        //Check inputs form if empty
        if(empty($_POST['name'])){
            $_SESSION['Failed'] = "something is wrong please try again in table Songs!";
            header("location: dashboard");
        }else{
            $data = array(
                'id'                    => $_POST['id'],
                'name_artist'           => $_POST['name'][0],
                'picture'               => $_FILES['picture'],
                'date_birthday_artist'  => $_POST['birthday_date'][0],
            );
            $add = Artist::update($data);
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
    function deleteArtist()
    {
        $add = Artist::delete($_POST['id']);
        if ($add === true) {
            $_SESSION['Success'] = '';
            header('location:dashboard');
        } else {
            $_SESSION['Failed'] = '';
            header('location:dashboard');
        }
    }
}
