<?php

class AdminController{
    function getAllUsers(){
        $data_Users = Admin::getAll();
        return $data_Users;
    }
}