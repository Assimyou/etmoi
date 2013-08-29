<?php
session_start();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

include_once 'dbh.php';
include_once 'controller/user/authentication.php';
session_write_close();

$q = date('Y');
$category = 'date';

include_once 'controller/event/search.php';
include_once 'controller/user/access.php';

include_once 'view/home.php';
?>