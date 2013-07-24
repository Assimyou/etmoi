<?php
session_start();

ini_set('include_path', ini_get('include_path').';./model/;./view/;./controller/');

include_once 'dbh.php';
include_once 'user/access.php';

$access = FALSE;

foreach ($visa as $key => $value) 
{
	if ($value == '') 
	{
		$id = $_GET['id'];
		$access = TRUE;
	}
	else
	{
		if (!empty($_SESSION['id'])) 
		{
			$id = $_SESSION['id'];
			$access = TRUE;
		}
	}
}
if ($access == TRUE) 
{
	include_once 'user/param.php';
	include_once 'profil.php';
}
else
{
	header('Location: index.php');
	exit();
}
?>