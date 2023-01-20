<?php

class ArtistController{
    function getAllArtists(){
        $data_artists = Artist::getAll();
        return $data_artists;
    }

    //create
    function addArtist()
    {
        if(empty($_POST['name'])
        || empty($_POST['birthday_date'])){
            $_SESSION['Failed'] = "Something is wrong please try again in table Categories!";
            header("location: dashboard");
        }else{
            $data = array(
                'name_artist' => $_POST['name'],
                'picture' => $_FILES['picture'],
                'date_birthday_artist' => $_POST['birthday_date'],
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
}
