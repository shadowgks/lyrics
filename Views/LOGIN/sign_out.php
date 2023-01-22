<?php
session_start();
//destroy session user
session_destroy();
//page home Redirect to page sign-in
header("location: ../../signin");

