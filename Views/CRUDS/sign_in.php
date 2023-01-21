<?php

//Admins
$obj_admins = new AdminController();
$data_admins = $obj_admins->getAllAdmins();
//__
//signin
if (isset($_POST['sign_in'])) {
    $obj_signin = new AdminController();
    $data_admins = $obj_signin->signIN();
}
//__
//count
$obj_count = new AdminController();
$count_admins = $obj_count->count();