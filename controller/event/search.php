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
}
else
{
	$q = date('Y-m-');
}

$event = new event($dbh);

$event->search($q);

foreach ($event->getResult() as $index => $result)
{
	$event->setRight($result['right']);
	$event->setLeft($result['left']);
		
	$event->selectParent();

	foreach ($event->getResult() as $parents => $parent) 
	{
		if ($result['left'] > $parent['left'] && $result['right'] < $parent['right']) 
		{
			if ($parent['wording'] == 'event') 
			{	
				$event->setId($parent['id']);
				$event->setRight($parent['right']);
				$event->setLeft($parent['left']);

				$event->selectChild();

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

				$listEvent[$event->getId()] = $events;

				if (!empty($publish) && $publish < 0)
				{
					unset($listEvent[$event->getId()]);
				}
			}
		}
	}
}
?>