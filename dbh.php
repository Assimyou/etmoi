<?php
/**
*	@category   PDO
*	@package    PDO
*	@copyright  Copyright (c) 2013 BiereStorming
*	@license    BiereStroming
*	@version    2013-07-13
*/

	$host = '127.0.0.1';
	$user = 'root';
	$pass = '';
	$database = 'etmoi';

	try
	{
		$dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
	}
	catch (PDOException $PDOError)
	{
		exit();
	}