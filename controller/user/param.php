<?php
/**
*	@category   controller
*	@package    user
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'classes/user.php';

if (!empty($id))
{
	$user = new user($dbh);

	$user->setId($id);
	$user->selectuser();

	$user->setRight($user->getResult()['right']);
	$user->setLeft($user->getResult()['left']);

	$user->selectChild();

	foreach ($user->getResult() as $children => $child) 
	{
		if (isset($users[$child['wording']]))
		{
			unset($users[$child['wording']]);
		}

		if ($child['right'] - $child['left'] > 1)
		{
			$multiple = array();

			foreach ($user->getResult() as $kids => $kid)
			{
				if ($child['left'] < $kid['left'] && $child['right'] > $kid['right'])
				{
					if ($kid['right'] - $kid['left'] == 1) 
					{
						$multiple[$kid['id']] = $kid['wording'];
					}
				}
			}

			$users[$child['wording']] = $multiple;
		}
	}
}

if (!empty($_POST) && $_POST['valider'] == "enregistrer") 
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
	if (!empty($name)) 
	{
		foreach ($name as $key => $value)
		{
			if (!empty($value))
			{
				$form['name'][$key] = $value;
			}
		}
	}
	if (!empty($mail)) 
	{
		foreach ($mail as $key => $value)
		{
			if (!empty($value))
			{
				$form['mail'][$key] = $value;
			}
		}
	}
	if (!empty($firstname)) 
	{
		foreach ($firstname as $key => $value)
		{
			if (!empty($value))
			{
				$form['firstname'][$key] = $value;
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
	if (!empty($illustration))
	{
		foreach ($illustration as $key => $value)
		{
			if (!empty($value))
			{
				move_uploaded_file($_FILES["import"]["tmp_name"], '/view/images/'.$_FILES["import"]["name"]);

				$form['illustration'][$key] = 'images/'.$_FILES["import"]["name"];
			}
		}
	}
	if (!empty($cover)) 
	{
		foreach ($cover as $key => $value)
		{
			if (!empty($value)) 
			{
				$form['cover'][$key] = $value;
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

	$user = new user($dbh);

	if (empty($id))
	{
		unset($init);

		$init[] = 'user';
		$init[] = 'mail';
		$init[] = 'password';
		$init[] = 'passport';
		$init[] = 'name';
		$init[] = 'firstname';
		$init[] = 'association';
		$init[] = 'description';
		$init[] = 'illustration';
		$init[] = 'cover';
		$init[] = 'address';
		$init[] = 'zip';
		$init[] = 'city';
		$init[] = 'date';

		foreach ($init as $key => $value) 
		{
			$user->selectLastuser();

			$index = $user->getResult()['right'];

			$user->setWording($value);

			if ($value == 'user') 
			{
				$index++;	
			}

			$user->setLeft($index);

			$index++;

			$user->setRight($index);

			$user->add();
		}
	}

	if(!empty($form))
	{
		if (!empty($id)) 
		{
			$user->setId($id);
			$user->selectuser();
		}
		else
		{
			$user->selectLastuser();
		}

		$user->setRight($user->getResult()['right']);
		$user->setLeft($user->getResult()['left']);

		$user->selectChild();

		foreach ($user->getResult() as $children => $child)
		{
			foreach ($form as $key => $value)
			{
				if ($key == $child['wording'])
				{
					if ($child['right'] - $child['left'] > 1)
					{
						$user->selectLastuser();

						$user->setRight($user->getResult()['right']);
						$user->setLeft($user->getResult()['left']);

						$user->selectChild();

						foreach($user->getResult() as $kids => $kid) 
						{
							if ($child['left'] < $kid['left'] && $child['right'] > $kid['right']) 
							{
								foreach ($value as $id => $sheet) 
								{
									$create[$id] = $sheet;

									if ($id == $kid['id'])
									{
										$delete[$id] = $id;
										$user->setRight(intval($kid['right']));
										$user->setWording($sheet);

										$user->update();
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

								$user->setWording($sheet);

								$user->setLeft($index);

								$index++;

								$user->setRight($index);

								$user->add();

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

							$user->setWording($sheet);

							$user->setLeft($index);

							$index++;

							$user->setRight($index);

							$user->add();
						}
					}
				}
			}
		}
	}
	
	header( "Location: ".$_SERVER['REQUEST_URI']);
	exit();
}

?>