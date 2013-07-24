<?php
session_start();

ini_set('include_path', ini_get('include_path').';./model/;./view/;./controller/');

include_once 'dbh.php';
include_once 'user/access.php';
include_once 'user/authentication.php';
include_once 'home.php';
?>