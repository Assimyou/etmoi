<?php
/**
*	@category   controller
*	@package    event
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'model/classes/event.php';
include_once 'model/classes/association.php';

if (!empty($id['event']))
{
	$event = new event($dbh);

	$event->setId($id['event']);
	$event->selectEvent();

	$event->setRight($event->getResult()['right']);
	$event->setLeft($event->getResult()['left']);

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
				}
			}

			$events[$child['wording']] = $multiple;
		}
	}
}

if (!empty($_POST['submit']) && $_POST['submit'] == 'supprimer') 
{
	if (!empty($_GET['q'])) 
	{
		$event->setId($_GET['q']);
		$event->selectEvent();

		$event->setRight($event->getResult()['right']);
		$event->setLeft($event->getResult()['left']);
		$event->setGap($user->getRight());
		
		$event->remove();
	}
}

if (!empty($token) && !empty($_POST['event-'.$_SESSION[$token]['token']]) && $_POST['event-'.$_SESSION[$token]['token']] == "enregistrer")
{
	extract($_POST);

	if (!empty($association)) 
	{
		foreach ($association as $key => $value)
		{
			if (!empty($value))
			{
				$form['association'][$key] = $value;
			}
		}
	}
	if (!empty($headline))
	{
		foreach ($headline as $key => $value)
		{
			if (!empty($value))
			{
				$form['headline'][$key] = $value;
			}
		}
	}
	if (!empty($description))
	{
		foreach ($description as $key => $value) 
		{
			if (!empty($value))
			{
				$form['description'][$key] = $value;
			}
		}
	}

	if (!empty($_FILES["illustration"]) && $_FILES['illustration']['error'] == 0)
	{
		if ($_FILES['illustration']['size'] <= 1000000) 
		{
			$accept = array('jpg', 'jpeg', 'gif', 'png');
			$info = pathinfo($_FILES['illustration']['name']);

			if (in_array($info['extension'], $accept)) 
			{
				$folder = uniqid(mt_rand());
				$path = './view/images/events/'.$folder;
				mkdir($path, 0, true);
				
				move_uploaded_file($_FILES["illustration"]["tmp_name"], str_replace('controller\event\param.php', 'view\images\events\\'.$folder.'\\'.$_FILES["illustration"]["name"], __FILE__));

				if (!empty($users['illustration'])) 
				{
					foreach ($users['illustration'] as $key => $value)
					{
						if (!empty($value))
						{
							$index = $key;
						}
					}
				}

				$form['illustration'][$index] = 'view/images/events/'.$folder.'/'.$_FILES["illustration"]["name"];
			}
		}
	}
	if (!empty($address))
	{
		foreach ($address as $key => $value)
		{
			if (!empty($value))
			{
				$form['address'][$key] = $value;
			}
		}
	}
	if (!empty($zip))
	{
		foreach ($zip as $key => $value)
		{
			if (!empty($value))
			{
				$form['zip'][$key] = $value;
			}
		}
	}
	if (!empty($city))
	{
		foreach ($city as $key => $value)
		{
			if (!empty($value))
			{
				$form['city'][$key] = $value;
			}
		}
	}
	if (!empty($location))
	{
		foreach ($location as $key => $value)
		{
			if (!empty($value))
			{
				$form['data-location'][$key] = $value;
			}
		}
	}
	if (!empty($hashtag))
	{
		foreach ($hashtag as $key => $value)
		{
			if (!empty($value))
			{
				$form['hashtag'][$key] = $value;
			}
		}
	}
	if (!empty($tag))
	{
		foreach ($tag as $key => $value)
		{
			if (!empty($value))
			{
				$form['tag'][$key] = $value;
			}
		}
	}
	if (!empty($publish))
	{
		foreach ($publish as $key => $value)
		{
			if (!empty($value))
			{
				$form['publish'][$key] = $value;
			}
		}
	}
	if (!empty($date))
	{
		foreach ($date as $key => $value)
		{
			if (!empty($value))
			{
				$form['date'][$key] = $value;
			}
		}
	}

	$event = new event($dbh);

	if (empty($id['event']))
	{
		unset($init);

		$init[] = 'event';
		$init[] = 'association';
		$inti[] = 'passport';
		$init[] = 'headline';
		$init[] = 'description';
		$init[] = 'illustration';
		$init[] = 'cover';
		$init[] = 'address';
		$init[] = 'zip';
		$init[] = 'city';
		$init[] = 'data-location';
		$init[] = 'hashtag';
		$init[] = 'tag';
		$init[] = 'publish';
		$init[] = 'date';

		foreach ($init as $key => $value) 
		{
			$event->selectLastEvent();

			$index = $event->getResult()['right'];

			$event->setWording($value);

			if ($value == 'event') 
			{
				$index++;	
			}

			$event->setLeft($index);

			$index++;

			$event->setRight($index);

			$event->add();
		}
	}

	if(!empty($form))
	{
		if (!empty($id['event'])) 
		{
			$event->setId($id['event']);
			$event->selectEvent();
		}
		else
		{
			$event->selectLastEvent();
		}

		$event->setRight($event->getResult()['right']);
		$event->setLeft($event->getResult()['left']);

		$event->selectChild();

		foreach ($event->getResult() as $children => $child)
		{
			foreach ($form as $key => $value)
			{
				if ($key == $child['wording'])
				{
					if ($child['right'] - $child['left'] > 1)
					{
						$event->selectLastEvent();

						$event->setRight($event->getResult()['right']);
						$event->setLeft($event->getResult()['left']);

						$event->selectChild();

						foreach($event->getResult() as $kids => $kid) 
						{
							if ($child['left'] < $kid['left'] && $child['right'] > $kid['right']) 
							{
								foreach ($value as $id => $sheet) 
								{
									$create[$id] = $sheet;

									if ($id == $kid['id'])
									{
										$delete[$id] = $id;
										$event->setRight(intval($kid['right']));
										$event->setWording($sheet);

										$event->update();
									}
								}
							}
						}

						if (!empty($delete)) 
						{
							foreach ($delete as $key => $value)
							{
								unset($create[$value]);
							}
						}

						if (!empty($create))
						{
							foreach ($create as $id => $sheet)
							{
								if (isset($gap))
								{
									$gap = $gap + 2;
								}
								else
								{
									$gap = 0;
								}

								$index = intval($child['right']) + $gap;

								$event->setWording($sheet);

								$event->setLeft($index);

								$index++;

								$event->setRight($index);

								$event->add();

								unset($create[$id]);
							}
						}
					}
					else
					{
						foreach ($value as $id => $sheet)
						{
							if (isset($gap))
							{
								$gap = $gap + 2;
							}
							else
							{
								$gap = 0;
							}

							$index = intval($child['right']) + $gap;

							$event->setWording($sheet);

							$event->setLeft($index);

							$index++;

							$event->setRight($index);

							$event->add();
						}
					}
				}
			}
		}
	}

	header( "Location: ".$_SERVER['REQUEST_URI']);
	exit();
}