<?php
function generateToken($name)
{
	session_start();

	$token = uniqid(mt_rand());
	$timeTokens = new DateTime('now');

	$_SESSION[$name]['token'] = $token;
	$_SESSION[$name]['time-token'] = $timeTokens;
	session_write_close();

	return $token;
}