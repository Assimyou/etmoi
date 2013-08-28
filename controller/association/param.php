<?php
/**
*	@category   controller
*	@package    association
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'model/classes/association.php';

if (!empty($id))
{
	$association = new association($dbh);

	$association->setId($id);
	$association->selectAsso();

	$association->setRight($association->getResult()['right']);
	$association->setLeft($association->getResult()['left']);

	$association->selectChild();

	foreach ($association->getResult() as $children => $child) 
	{
		if (isset($associations[$child['wording']]))
		{
			unset($associations[$child['wording']]);
		}

		if ($child['right'] - $child['left'] > 1)
		{
			$multiple = array();

			foreach ($association->getResult() as $kids => $kid)
			{
				if ($child['left'] < $kid['left'] && $child['right'] > $kid['right'])
				{
					if ($kid['right'] - $kid['left'] == 1) 
					{
						$multiple[$kid['id']] = $kid['wording'];
					}
				}
			}

			$associations[$child['wording']] = $multiple;
		}
	}
}

if (!empty($_POST['submit']) && $_POST['submit'] == 'supprimer') 
{
	if (!empty($_GET['q'])) 
	{
		$association->setId($_GET['q']);
		$association->selectAsso();

		$association->setRight($association->getResult()['right']);
		$association->setLeft($association->getResult()['left']);

		$diff = $association->getResult()['right'] - $association->getResult()['left'];

		$association->selectChild();

		for ($i=0; $i <= $diff; $i++)
		{
			foreach ($association->getResult() as $children => $child)
			{
				if ($child['right'] - $child['left'] == $i)
				{
					$association->setId($child['id']);
					$association->remove();
				}
			}
		}
	}
}

if (!empty($token) && !empty($_POST['association-'.$_SESSION[$token]['token']]) && $_POST['association-'.$_SESSION[$token]['token']] == "enregistrer") 
{
	extract($_POST);

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
	if (!empty($_FILES["illustration"]))
	{
		if ($_FILES['illustration']['size'] <= 1000000) 
		{
			$accept = array('jpg', 'jpeg', 'gif', 'png');
			$info = pathinfo($_FILES['illustration']['name']);

			if (in_array($info['extension'], $accept)) 
			{
				move_uploaded_file($_FILES["illustration"]["tmp_name"], str_replace('controller\association\param.php', 'view\images\\'.$_FILES["illustration"]["name"], __FILE__));
				
				if (!empty($associations['illustration'])) 
				{
					foreach ($associations['illustration'] as $key => $value)
					{
						if (!empty($value))
						{
							$index = $key;
						}
					}
				}

				$form['illustration'][$index] = 'images/'.$_FILES["illustration"]["name"];
			}
		}
	}
	if (!empty($_FILES['cover']) && $_FILES['cover']['error'] == 0)
	{
		if ($_FILES['cover']['size'] <= 1000000) 
		{
			$accept = array('jpg', 'jpeg', 'gif', 'png');
			$info = pathinfo($_FILES['cover']['size']);

			if (in_array($info['extension'], $accept)) 
			{
				move_uploaded_file($_FILES["cover"]["tmp_name"], str_replace('controller\association\param.php', 'view\images\\'.$_FILES["cover"]["name"], __FILE__));
		
				if (empty($associations['cover'])) 
				{
					foreach ($associations['cover'] as $key => $value)
					{
						if (!empty($value))
						{
							$index = $key;
						}
					}
				}

				$form['cover'][$index] = 'images/'.$_FILES["cover"]["name"];
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

	$association = new association($dbh);

	if (empty($_GET['q']))
	{
		unset($init);

		$init[] = 'association';
		$init[] = 'name';
		$init[] = 'description';
		$init[] = 'illustration';
		$init[] = 'cover';
		$init[] = 'address';
		$init[] = 'zip';
		$init[] = 'city';
		$init[] = 'date';

		foreach ($init as $key => $value) 
		{
			$association->selectLastAsso();

			$index = $association->getResult()['right'];

			$association->setWording($value);

			if ($value == 'association') 
			{
				$index++;	
			}

			$association->setLeft($index);

			$index++;

			$association->setRight($index);

			$association->add();
		}
	}

	if(!empty($form))
	{
		if (!empty($_GET['q'])) 
		{
			$association->setId($_GET['q']);
			$association->selectAsso();
		}
		else
		{
			$association->selectLastAsso();
		}

		$association->setRight($association->getResult()['right']);
		$association->setLeft($association->getResult()['left']);

		$association->selectChild();

		foreach ($association->getResult() as $children => $child)
		{
			foreach ($form as $key => $value)
			{
				if ($key == $child['wording'])
				{
					if ($child['right'] - $child['left'] > 1)
					{
						$association->selectLastAsso();

						$association->setRight($association->getResult()['right']);
						$association->setLeft($association->getResult()['left']);

						$association->selectChild();

						foreach($association->getResult() as $kids => $kid) 
						{
							if ($child['left'] < $kid['left'] && $child['right'] > $kid['right']) 
							{
								foreach ($value as $id => $sheet) 
								{
									$create[$id] = $sheet;

									if ($id == $kid['id'])
									{
										$delete[$id] = $id;
										$association->setRight(intval($kid['right']));
										$association->setWording($sheet);

										$association->update();
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

								$association->setWording($sheet);

								$association->setLeft($index);

								$index++;

								$association->setRight($index);

								$association->add();

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

							$association->setWording($sheet);

							$association->setLeft($index);

							$index++;

							$association->setRight($index);

							$association->add();
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