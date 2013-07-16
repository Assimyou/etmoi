<?php
/**
*	@category   controller
*	@package    association
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'model/association.php';

if (!empty($_GET['id']))
{
	$association = new association($dbh);

	$association->setId($_GET['id']);
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

if (!empty($_POST) && $_POST['valider'] == "enregistrer") 
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
	if (!empty($illustration)) 
	{
		foreach ($illustration as $key => $value)
		{
			if (!empty($value)) 
			{
				$form['illustration'][$key] = $value;
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

	$association = new association($dbh);

	if (empty($_GET['id']))
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
		if (!empty($_GET['id'])) 
		{
			$association->setId($_GET['id']);
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
}

include_once 'view/association/param/index.php';
?>