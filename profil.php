<?php
session_start();

ini_set('include_path', ini_get('include_path').';./model/;./view/;./controller/');

include_once 'dbh.php';
include_once 'user/authentication.php';
include_once 'user/access.php';

if (!empty($_SESSION['id']))
{
	$id = $_SESSION['id'];

	if (!empty($_GET['id'])) 
	{
		foreach ($visa as $key => $value)
		{
			if ($value == 'webmaster')
			{
				$id = $_GET['id'];
			}
		}
	}

	include_once 'user/param.php';
	include_once 'view/profil.php';
}
else
{
	header('Location: .');
	exit();
}
?>