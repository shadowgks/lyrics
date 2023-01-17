<?php
require_once 'ArtistControlller.php';
require_once 'CategorieController.php';
require_once 'SongController.php';
require_once 'AdminController.php';

class HomeController{
    function index($page){
        include 'views/'.$page.'.php';
    }
}