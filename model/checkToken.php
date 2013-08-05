<?php
function checkToken($timeOut, $name)
{
	$boolean = FALSE;

	if (!empty($_SESSION[$name]['token']) && !empty($_SESSION[$name]['time-tokens']))
	{
		$date = new DateTime('now');

		$diff = $_SESSION[$name]['time-tokens']->diff($date);
		$timing = $diff->format('%i');

		if($timing < $timeOut)
		{
			$boolean = TRUE;
		}
	}

	return $boolean;
}
?>