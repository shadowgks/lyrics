<?php

class CategorieController{
    function getAllGeners(){
        $data_geners = Categorie::getAll();
        return $data_geners;
    }
    //create
    function addCategorie(){
        if(isset($_POST['add_gener'])){
            
            $data = array(
                'name_gener' => $_POST['name'],            
            );

            $add = Categorie::add($data);
            if($add === true){
                // Redirect::To('home');
                // var_dump(Redirect::To('home.php'));
                
                // die;
                echo 'good';
                header('location:dashboard');
            }else{
                echo 'faild';
            }
        }
    }
}

