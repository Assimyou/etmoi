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

	include_once 'user/param.php';

	foreach ($visa as $key => $value)
	{
		if ($value == 'webmaster')
		{
			$ISLEADER = TRUE;
		}
		elseif ($ISLEADER == FALSE) 
		{
			if ($value == 'leader' && $profil['association'] == $users['association']) 
			{
				$ISLEADER = TRUE;
			}
		}
	}
}

if (!empty($_GET['q'])) 
{
	$id = $_GET['q'];
}
include_once 'association/param.php';

if (!empty($_GET['q']))
{
	include_once 'event/param.php';

	if ($ISLEADER)
	{
		$newToken = 'association-'.generateToken($_SERVER['REQUEST_URI']);
	}

	if (!empty($_GET['act']) && $_GET['act'] == 'edit') 
	{
		include_once 'view/association-form.php';
	}
	else
	{
		include_once 'view/association.php';
	}
}
elseif (!empty($_GET['act']) && $_GET['act'] == 'edit') 
{
	include_once 'association/param.php';

	include_once 'view/association-form.php';
}
else
{
	header('Location: .');
}
?>