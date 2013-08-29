<?php
session_start();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

include_once 'dbh.php';
include_once 'controller/user/authentication.php';
session_write_close();

include_once 'controller/user/access.php';

if (!empty($_GET['q'])) 
{
	$q['association'] = $_GET['q'];
}

include_once 'controller/association/search.php';
include_once 'view/association-search.php';
?>