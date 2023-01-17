<?php

class ArtistController{
    function getAllArtists(){
        $data_artists = Artist::getAll();
        return $data_artists;
    }
}
