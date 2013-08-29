<?php
/**
*	@category   controller
*	@package    user
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'model/classes/user.php';

if (!empty($_POST) && $_POST['research'] == "rechercher") 
{
	extract($_POST);
	
	$user = new user($dbh);

	$user->search($word);

	foreach ($user->getResult() as $index => $result)
	{
		$user->setRight($result['right']);
		$user->setLeft($result['left']);
		
		$user->selectParent();

		foreach ($user->getResult() as $parents => $parent) 
		{
			if ($result['left'] > $parent['left'] && $result['right'] < $parent['right']) 
			{
				if ($parent['wording'] == 'user') 
				{
					$user->setId($parent['id']);
					$user->setRight($parent['right']);
					$user->setLeft($parent['left']);

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

					$listUser[$user->getId()] = $users;
				}
			}
		}
	}
}