<?php

//Categories
if (isset($_POST['delete_categorie'])) {
    $obj_categorie = new CategorieController();
    $add_categorie = $obj_categorie->updateCategorie();
}
//Artists
if (isset($_POST['delete_artist'])) {
    $obj_artist = new ArtistController();
    $add_artist = $obj_artist->updateAlbum();
}
//Songs
if (isset($_POST['delete_song'])) {
    $obj_song = new SongController();
    $add_song = $odeleteg->updateSong();
}
//Albums
if (isset($_POST['delete_album'])) {
    $obj_album = new AlbumController();
    $add_Album = $obj_album->deleteAlbum();
}