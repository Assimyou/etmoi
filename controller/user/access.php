<?php
/**
*	@category   controller
*	@package    user
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'classes/passport.php';

if (!empty($profil['passport']))
{
	$passport = new passport($dbh);

	$passport->setId($profil['passport']);
	$passport->selectpassport();

	$passport->setRight($passport->getResult()['right']);
	$passport->setLeft($passport->getResult()['left']);

	$passport->selectChild();

	foreach ($passport->getResult() as $index => $child) 
	{
		$visa[$child['id']] = $child['wording'];
	}
}
?>