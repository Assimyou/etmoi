<?php
/**
*	@category   controller
*	@package    user
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'model/classes/user.php';

if (!empty($_POST['submit']) && $_POST['submit'] == "Se deconnecter") 
{
	session_destroy();
	header("Location: ".$_SERVER['REQUEST_URI']);
	exit();
}

if (!empty($_POST['submit']) && $_POST['submit'] == "Se connecter") 
{
	extract($_POST);

	if (!empty($mail)) 
	{
		$form['mail'] = $mail;
	}
	if (!empty($password))
	{
		$form['password'] = md5($password);
	}

	$form['passport'] = 7;

	if(!empty($form))
	{
		$user = new user($dbh);

		$user->search($form['mail']);
		
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
						if (isset($gap))
						{
							$gap = $gap + 2;
						}
						else
						{
							$gap = 0;
						}

						$index = intval($child['right']) + $gap;

						$user->setWording($value);

						$user->setLeft($index);

						$index++;

						$user->setRight($index);

						$user->add();
					}
				}
			}

			$user->selectLastuser();

			$_SESSION['id'] = $user->getResult()['id'];
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
											if ($kid['wording'] == $form['password'])
											{
												$_SESSION['id'] = $parent['id'];
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

	header( "Location: ".$_SERVER['REQUEST_URI']);
	exit();
}

if (!empty($_SESSION['id']))
{
	$user = new user($dbh);

	$user->setId($_SESSION['id']);
	$user->selectuser();

	$user->setRight($user->getResult()['right']);
	$user->setLeft($user->getResult()['left']);

	$user->selectChild();

	foreach ($user->getResult() as $children => $child) 
	{
		if ($child['right'] - $child['left'] > 1)
		{
			foreach ($user->getResult() as $kids => $kid)
			{
				if ($child['left'] < $kid['left'] && $child['right'] > $kid['right'])
				{
					if ($kid['right'] - $kid['left'] == 1)
					{
						$profil[$child['wording']] = $kid['wording'];
					}
				}
			}
		}
	}
}
?>