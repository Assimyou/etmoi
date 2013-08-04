<?php
session_start();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

ini_set('include_path', ini_get('include_path').';./model/;./view/;./controller/');

include_once 'dbh.php';
include_once 'user/authentication.php';
session_write_close();

include_once 'user/access.php';

$allow = FALSE;

if (!empty($_GET['act']) && $_GET['act'] == 'edit') 
{
	if (!empty($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	
		if (!empty($_GET['q'])) 
		{
			foreach ($visa as $key => $value)
			{
				if ($value == 'webmaster')
				{
					$id = $_GET['q'];
				}
			}
		}

		if (checkToken(10, $_SERVER['REQUEST_URI']))
		{
			$token = $_SERVER['REQUEST_URI'];
		}
		else
		{
			$token = "";
		}

		$allow = TRUE;
		include_once 'user/param.php';
		include_once 'view/profile-form.php';
	}
}

if ($allow == FALSE) 
{
	if (!empty($_GET['q'])) 
	{
		$id = $_GET['q'];

		include_once 'user/param.php';
		include_once 'view/profile.php';
	}
	elseif (!empty($_SESSION['id'])) 
	{
		$id = $_SESSION['id'];

		include_once 'user/param.php';
		include_once 'view/profile.php';
	}
	else
	{
		header('Location: .');
		exit();
	}
}
?>