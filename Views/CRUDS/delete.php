<?php

//Categories
if (isset($_POST['delete_categorie'])) {
    $obj_categorie = new CategorieController();
    $obj_categorie->deleteCategorie();
}
//Artists
if (isset($_POST['delete_artist'])) {
    $obj_artist = new ArtistController();
    $obj_artist->deleteArtist();
}
//Songs
if (isset($_POST['delete_song'])) {
    $obj_song = new SongController();
    $obj_song->deleteSong();
}
//Albums
if (isset($_POST['delete_album'])) {
    $obj_album = new AlbumController();
    $obj_album->deleteAlbum();
}
