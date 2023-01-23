<?php

if (isset($_SESSION['Admin'])) {
    //Admin
    $obj_admin = new AdminController();
    $data_array_admins = $obj_admin->getAllAdmins();
    $count_admins = $data_array_admins['count'];
    $data_ad = $data_array_admins['fetch_all'];
    
    //Artists 
    $obj_artists = new ArtistController();
    $data_array_artists = $obj_artists->getAllArtists();
    $count_artists = $data_array_artists['count'];
    $data_artists = $data_array_artists['fetch_all'];
    
    //Categories
    $obj_categories = new CategorieController();
    $data_array_categories = $obj_categories->getAllCategorie();
    $count_categories = $data_array_categories['count'];
    $data_categories = $data_array_categories['fetch_all'];
    
    //Songs
    $obj_songs = new SongController();
    $data_array_songs = $obj_songs->getAllSongs();
    $count_songs = $data_array_songs['count'];
    $data_songs = $data_array_songs['fetch_all'];
    
    //Albums
    $obj_albums = new AlbumController();
    $data_array_albums = $obj_albums->getAllAlbums();
    $count_albums = $data_array_albums['count'];
    $data_albums = $data_array_albums['fetch_all'];
}

