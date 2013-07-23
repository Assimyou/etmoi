<?php
session_start();
include_once 'dbh.php';

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
	include_once 'controller/user/param.php';
	include_once 'view/profil.php';
}
else
{
	header('Location: index.php');
	exit();
}
?>