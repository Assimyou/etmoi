<?php
/**
*	@category   controller
*	@package    user
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'model/user.php';

if (!empty($_POST) && $_POST['valider'] == "enregistrer") 
{
	extract($_POST);

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
	if (!empty($password)) 
	{
		foreach ($password as $key => $value)
		{
			if (!empty($value))
			{
				$form['password'][$key] = md5($value);
			}
		}
	}

	if(!empty($form))
	{
		$user = new user($dbh);

		foreach ($form as $wording => $data) 
		{
			if ($wording == 'mail') 
			{
				foreach ($data as $key => $value) 
				{
					$user->search($value);
				}
			}
		}

		if ($user->getResult() == FALSE)
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

			$user->selectLastuser();

			$user->setRight($user->getResult()['right']);
			$user->setLeft($user->getResult()['left']);

			$user->selectChild();

			foreach ($user->getResult() as $children => $child)
			{
				foreach ($form as $key => $value)
				{
					if ($key == $child['wording'])
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

			$user->selectLastuser();

			$_SESSION['user'] = $user->getResult()['id'];
		}
		else
		{
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
								if ($child['wording'] == 'password') 
								{
									foreach ($user->getResult() as $kids => $kid) 
									{
										if ($child['left'] < $kid['left'] && $child['right'] > $kid['right']) 
										{
											foreach ($form['password'] as $key => $value) 
											{
												if ($kid['wording'] == $value)
												{
													$_SESSION['user'] = $parent['id'];
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

include_once 'view/user/authentification/index.php';
?>