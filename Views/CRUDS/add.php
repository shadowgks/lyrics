<?php

//Categories
if (isset($_POST['save_categorie'])) {
    $obj_categorie = new CategorieController();
    $add_categorie = $obj_categorie->addCategorie();
}
//Artists
if (isset($_POST['save_artist'])) {

    $obj_artist = new ArtistController();
    $add_artist = $obj_artist->addArtist();
}
//Songs
if (isset($_POST['save_song'])) {
    $obj_song = new SongController();
    $add_song = $obj_song->addSong();
}
//Albums
if (isset($_POST['save_album'])) {
    $obj_album = new AlbumController();
    $add_Album = $obj_album->addAlbum();
}
//signup
if (isset($_POST['save_signup'])) {
    $obj_signup = new AdminController();
    $add_user = $obj_signup->signUpUser();
}
