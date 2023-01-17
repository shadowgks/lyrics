<?php

require_once('autoload.php');

$obj = new HomeController();
$array_pages = ['dashboard','home','profilesong','signin','signup'];

if(isset($_GET['pages'])){
    if(in_array($_GET['pages'], $array_pages)){
        $page = $_GET['pages'];
        $obj->index($page);
    }else{
        include 'Views/includes/404.php';
    }
}else{
    include 'Views/home.php';
}