<?php

//Artists 
$obj_artists = new ArtistController();
$data_artists = $obj_artists->getAllArtists();
//count
$obj_count = new ArtistController();
$count_artists = $obj_count->count();

//Categories
$obj_categories = new CategorieController();
$data_categories = $obj_categories->getAllCategorie();
//count
$obj_count = new CategorieController();
$count_categories = $obj_count->count();

//Songs
$obj_songs = new SongController();
$data_songs = $obj_songs->getAllSongs();
//__
//count
$obj_count = new SongController();
$count_songs = $obj_count->count();

//Albums
$obj_albums = new AlbumController();
$data_albums = $obj_albums->getAllAlbums();
//__
//count
$obj_count = new AlbumController();
$count_albums = $obj_count->count();
