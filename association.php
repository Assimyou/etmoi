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

if (!empty($_SESSION['id']))
{
	if (!empty($_GET['act']) && $_GET['act'] == 'edit') 
	{
		foreach ($visa as $key => $value)
		{
			if ($value == 'leader')
			{
				if (checkToken(10, $_SERVER['REQUEST_URI']))
				{
					$token = $_SERVER['REQUEST_URI'];
				}
				else
				{
					$token = "";
				}

				$allow = TRUE;
				include_once 'association/param.php';
				include_once 'view/association-form.php';
			}
		}
	}
}

if ($allow == FALSE) 
{
	if (!empty($_GET['q']))
	{
		include_once 'association/param.php';
		include_once 'view/association.php';
	}
	else
	{
		header('Location: .');
	}
}
?>