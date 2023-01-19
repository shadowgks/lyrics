<?php
// if(isset($_POST['add_artist'])){
//     var_dump($_POST);
//     die;
// }

if(isset($_POST['save_categorie'])){
    $obj_categorie = new CategorieController();
    $add_categorie = $obj_categorie->addCategorie();
}
