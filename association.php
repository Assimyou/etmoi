<?php
session_start();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

ini_set('include_path', ini_get('include_path').';./model/;./view/;./controller/');

include_once 'dbh.php';
include_once 'user/authentication.php';
session_write_close();

include_once 'user/access.php';

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

	if (!empty($_GET['act']) && $_GET['act'] == 'edit') 
	{
		foreach ($visa as $key => $value)
		{
			if ($value == 'leader')
			{
				if ($value == 'webmaster')
				{
					$ISLEADER = TRUE;
				}
				elseif ($value == 'leader' && $profil['association'] == $users['association']) 
				{
					$ISLEADER = TRUE;
				}
			}
		}
	}
}

if (!empty($_GET['q']))
{
	include_once 'event/param.php';
	include_once 'association/param.php';

	if ($ISLEADER)
	{
		$newToken = generateToken($_SERVER['REQUEST_URI']);
	}

	include_once 'view/association.php';
}
else
{
	header('Location: .');
}
?>