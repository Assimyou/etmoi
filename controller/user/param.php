<?php
/**
*	@category   controller
*	@package    user
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'model/classes/user.php';

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

if (!empty($_POST['submit']) && $_POST['submit'] == 'supprimer') 
{
	if (!empty($_GET['id'])) 
	{
		$user->setId($_GET['id']);
		$user->selectuser();

		$user->setRight($user->getResult()['right']);
		$user->setLeft($user->getResult()['left']);
		$user->setGap($user->getRight());
		
		$user->remove();
		
	}
}

if (!empty($token) && !empty($_POST['user-'.$_SESSION[$token]['token']]) && $_POST['user-'.$_SESSION[$token]['token']] == "enregistrer") 
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
	if (!empty($sex)) 
	{
		foreach ($sex as $key => $value)
		{
			if (!empty($value))
			{
				$form['sex'][$key] = $value;
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
				$path['dir'] = explode('\\', __DIR__);

				foreach ($path['dir'] as $key => $value) 
				{
					if ($value == 'controller' || $value == 'model')
					{
						$replace = array('controller' => 'view', 'model' => 'view', $path['dir'][$key+1] => 'images ');

						$path['img-dir'] = explode(' ', strtr(__DIR__, $replace));
						$path['img-dir'] = $path['img-dir'][0];
					}
				}

				$folder['dir'] = uniqid(mt_rand());

				$folder['path'] = $path['img-dir'].'\\'.$folder['dir'];

				mkdir($folder['path'], 0, true);

				$img['large'] = array('dir' => '\lagre');
				$img['medium'] = array('dir' => '\medium', 'width' => '512', 'height' => '384');
				$img['small'] = array('dir' => '\small', 'width' => '256', 'height' => '192');

				foreach ($img as $size => $info) 
				{
					foreach ($info as $key => $value) 
					{
						if ($key == 'dir') 
						{
							mkdir($folder['path'].$value, 0, true);

							$img[$size]['path'] = $folder['path'].$value;
							$img[$size]['file'] = $img[$size]['path'].'\\'.$_FILES["illustration"]["name"];
						}
					}
				}
				
				move_uploaded_file($_FILES["illustration"]["tmp_name"], $img['large']['file']);
				
				$img['large']['data'] = imagecreatefromjpeg($img['large']['file']);
							
				$img['large']['size'] = getimagesize($img['large']['file']);

				list($img['large']['width'], $img['large']['height']) = $img['large']['size'];

				foreach ($img as $size => $info) 
				{
					if ($size != 'large') 
					{
						$img[$size]['data'] = imagecreatetruecolor($img[$size]['width'], $img[$size]['height']);
						imagecopyresampled($img[$size]['data'], $img['large']['data'], 0, 0, 0, 0, $img[$size]['width'], $img[$size]['height'], $img['large']['width'], $img['large']['height']);

						imagejpeg($img[$size]['data'], $img[$size]['file']);		
					}
				}

				/*
				$folder = uniqid(mt_rand());
				$path = './view/images/profiles/'.$folder.'/src';
				mkdir($path, 0, true);
				
				move_uploaded_file($_FILES["illustration"]["tmp_name"], str_replace('controller\user\param.php', 'view\images\profiles\\'.$folder.'\src\\'.$_FILES["illustration"]["name"], __FILE__));
				
				$src['data-img'] = imagecreatefromjpeg($path.'/'.$_FILES["illustration"]["name"]);
				
				$size = getimagesize(str_replace('controller\user\param.php', 'view\images\profiles\\'.$folder.'\src\\'.$_FILES["illustration"]["name"], __FILE__));

				list($src['width'], $src['height']) = $size;

				var_dump($src);
				var_dump(__DIR__);
				echo str_replace('controller\user', 'view\images\\'.md5('profiles'), __DIR__);
				exit();
				imagecopyresampled($, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				*/
				//move_uploaded_file($_FILES["illustration"]["tmp_name"], str_replace('controller\user\param.php', 'view\images\\'.$_FILES["illustration"]["name"], __FILE__));

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

				$form['illustration'][$index] = 'images/'.$folder['dir'].'/large/'.$_FILES["illustration"]["name"];
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
				move_uploaded_file($_FILES["cover"]["tmp_name"], str_replace('controller\user\param.php', 'view\images\\'.$_FILES["cover"]["name"], __FILE__));
		
				if (!empty($users['cover'])) 
				{
					foreach ($users['cover'] as $key => $value)
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
	if (!empty($twitter)) 
	{
		foreach ($twitter as $key => $value)
		{
			if (!empty($value)) 
			{
				$form['twitter'][$key] = $value;
			}
		}
	}
	if (!empty($facebook)) 
	{
		foreach ($facebook as $key => $value)
		{
			if (!empty($value)) 
			{
				$form['facebook'][$key] = $value;
			}
		}
	}
	if (!empty($instagram)) 
	{
		foreach ($instagram as $key => $value)
		{
			if (!empty($value)) 
			{
				$form['instagram'][$key] = $value;
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
		$init[] = "data-location";
		$init[] = 'date';
		$init[] = 'sex';
		$init[] = 'twitter';
		$init[] = 'facebook';
		$init[] = 'instagram';

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