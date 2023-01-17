<?php

class SongController{
    function getAllSongs(){
        $data_songs = Song::getAll();
        return $data_songs;
    }
}