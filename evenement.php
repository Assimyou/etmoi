<?php
session_start();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

include_once 'dbh.php';
include_once 'controller/user/authentication.php';
session_write_close();

include_once 'controller/user/access.php';

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
				if (!empty($_GET['q'])) 
				{
					$id['event'] = $_GET['q'];
				}
				include_once 'controller/event/param.php';
				include_once 'view/event-form.php';
			}
		}
	}
}

if ($allow == FALSE) 
{
	if (!empty($_GET['q']))
	{
		$id['event'] = $_GET['q'];
		
		include_once 'controller/event/param.php';
		require_once 'model/classes/instagram.class.php';
		$instagram = new Instagram('44a354e34a344471aed0e4df151513b4');

		if (!empty($events['association'])) 
		{
			foreach ($events['association'] as $key => $value) 
			{
				$id['association'] = $value;
			}
		}

		include_once 'controller/association/param.php';

		include_once 'view/event.php';
	}
	else
	{
		header('Location: .');
	}
}
?>