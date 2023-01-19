<?php
//Read
//===========================================
//Artists 
$obj_artists = new ArtistController();
$data_artists = $obj_artists->getAllArtists();
//Categories
$obj_categories = new CategorieController();
$data_categories = $obj_categories->getAllCategorie();
//Songs
$obj_songs = new SongController();
$data_songs = $obj_songs->getAllSongs();
//Admins
$obj_users = new AdminController();
$data_users = $obj_users->getAllUsers();
//Albums
$obj_albums = new AlbumController();
$data_albums = $obj_albums->getAllAlbums();
