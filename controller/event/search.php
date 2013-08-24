<?php
/**
*	@category   controller
*	@package    event
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'classes/event.php';

if (!empty($_GET['q'])) 
{
	$q = $_GET['q'];

	if (!empty($_GET['cat'])) 
	{
		$category = $_GET['cat'];
	}
}
else
{
	$q = date('Y-m-');
	$category = 'date';
}

$event = new event($dbh);

$event->search($q);

if ($event->getResult() != FALSE)
{
	foreach ($event->getResult() as $index => $result)
	{
		$event->setRight($result['right']);
		$event->setLeft($result['left']);
			
		$event->selectParent();

		foreach ($event->getResult() as $parents => $parent) 
		{
			if ($result['left'] > $parent['left'] && $result['right'] < $parent['right']) 
			{
				$valid = FALSE;

				foreach ($event->getResult() as $key => $value) 
				{
					if ($value['wording'] == $category) 
					{
						$valid = TRUE;
					}
				}

				if ($parent['wording'] == 'event' && $valid) 
				{	
					$event->setId($parent['id']);
					$event->setRight($parent['right']);
					$event->setLeft($parent['left']);

					$event->selectChild();

					$events['id'] = $event->getId();

					foreach ($event->getResult() as $children => $child) 
					{
						if (isset($events[$child['wording']])) 
						{
							unset($events[$child['wording']]);
						}

						if ($child['right'] - $child['left'] > 1) 
						{
							$multiple = array();

							foreach ($event->getResult() as $kids => $kid) 
							{
								if ($child['left'] < $kid['left'] && $child['right'] > $kid['right']) 
								{
									if ($kid['right'] - $kid['left'] == 1) 
									{
										$multiple[$kid['id']] = $kid['wording'];
									}
									if ($child['wording'] == 'publish') 
									{
										$publish = new DateTime($kid['wording']);
										$today = new DateTime(date('Y-m-d'));
										$diff = $publish->diff($today);
											
										$publish = $diff->format('%R%a');
									}
								}
							}

							$events[$child['wording']] = $multiple;
						}
					}
				}
			}
		}
					
		if (!empty($publish) && $publish > 0)
		{
			$listEvent[] = $events;
		}
	}
}
?>