<?php

//Categories
if (isset($_POST['update_categorie'])) {
    $obj_categorie = new CategorieController();
    $obj_categorie->updateCategorie();
}
//Artists
if (isset($_POST['update_artist'])) {
    $obj_artist = new ArtistController();
    $obj_artist->updateAlbum();
}
//Songs
if (isset($_POST['update_song'])) {
    $obj_song = new SongController();
    $obj_song->updateSong();
}
//Albums
if (isset($_POST['update_album'])) {
    $obj_album = new AlbumController();
    $obj_album->updateAlbum();
}
