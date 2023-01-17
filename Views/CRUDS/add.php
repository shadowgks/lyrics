<?php
// if(isset($_POST['add_artist'])){
//     var_dump($_POST);
//     die;
// }

if(isset($_POST['add_gener'])){
    // $data = count($_POST);
    // var_dump($_POST['name'][0]);
    // echo $data;
    // die;
    // var_dump($_POST['name'][4]);
    // die;
    $obj_categorie = new CategorieController();
    $add_categorie = $obj_categorie->addCategorie();
}
