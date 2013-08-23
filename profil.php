<?php
session_start();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

ini_set('include_path', ini_get('include_path').';./model/;./view/;./controller/');

include_once 'dbh.php';
include_once 'user/authentication.php';
session_write_close();

include_once 'user/access.php';

$ISME = FALSE;
$ISLEADER = FALSE;

if (!empty($_SESSION['id']))
{
	if (checkToken(10, $_SERVER['REQUEST_URI']))
	{
		$token = $_SERVER['REQUEST_URI'];
	}
	else
	{
		$token = "";
	}

	$id = $_SESSION['id'];

	$ISME = TRUE;
	
	if (!empty($_GET['q']) && $_GET['q'] != $_SESSION['id']) 
	{
		$ISME = FALSE;

		foreach ($visa as $key => $value)
		{
			if ($value == 'webmaster')
			{
				$id = $_GET['q'];

				$ISME = TRUE;
			}
			elseif ($value == 'leader' && $profil['association'] == $users['association']) 
			{
				$ISLEADER = TRUE;
			}
		}
	}
}

include_once 'user/param.php';

if (!empty($_GET['act']) && $_GET['act'] == 'edit' && $isMe == TRUE)  
{
	include_once 'view/profile-form.php';
}
elseif (!empty($id))
{
	include_once 'view/profile.php';
}
else
{
	header('Location: .');
	exit();
}
?>