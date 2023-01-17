<?php
//Read
//===========================================
//Artists 
$obj_artists = new ArtistController();
$data_artists = $obj_artists->getAllArtists();
//Geners
$obj_geners = new CategorieController();
$data_geners = $obj_geners->getAllGeners();
//Songs
$obj_songs = new SongController();
$data_songs = $obj_songs->getAllSongs();
//Clients
$obj_users = new AdminController();
$data_users = $obj_users->getAllUsers();