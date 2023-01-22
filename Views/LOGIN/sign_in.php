<?php

//Admins
//signin
if (isset($_POST['sign_in'])) {
    $obj_signin = new AdminController();
    $data_admins = $obj_signin->signIN();
}

//read
$obj_admin = new AdminController();
$data_array_admins = $obj_admin->getAllAdmins();
$count_admins = $data_array_admins['count'];
$data_ad = $data_array_admins['fetch_all'];