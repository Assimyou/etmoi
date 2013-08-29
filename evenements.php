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
	$q['event'] = $_GET['q'];

	if (!empty($_GET['cat'])) 
	{	
		$category = $_GET['cat'];

		if ($_GET['cat'] == 'date')
		{
			$dateSearch = DateTime::createFromFormat('d-m-Y', $_GET['q']);
			$q['event'] = $dateSearch->format('Y-m-d');
		}
	}
}
else
{
	$q['event'] = date('Y-m-');
	$category = 'date';
}

include_once 'controller/event/search.php';
include_once 'view/event-search.php';