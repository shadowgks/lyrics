<?php

class ArtistController{
    function getAllArtists(){
        $data_artists = Artist::getAll();
        return $data_artists;
    }

    //create
    function addArtist()
    {
        if (isset($_POST['save_artist'])) {

            $data = array(
                'name_artist' => $_POST['name'],
                'picture_artist' => $_FILES['picture'],
                'date_birthday_artist' => $_POST['birthday_date'],
                
            );

            $add = Artist::add($data);
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
