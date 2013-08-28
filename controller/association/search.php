<?php
/**
*	@category   controller
*	@package    association
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'model/classes/association.php';

if (!empty($_GET['q'])) 
{
	$q = $_GET['q'];
}
else
{
	$q = '';
}
	
$association = new association($dbh);

$association->search($q);

if ($association->getResult() != FALSE) 
{
	foreach ($association->getResult() as $index => $result)
	{
		$association->setRight($result['right']);
		$association->setLeft($result['left']);
		
		$association->selectParent();

		foreach ($association->getResult() as $parents => $parent) 
		{
			if ($result['left'] > $parent['left'] && $result['right'] < $parent['right']) 
			{
				if ($parent['wording'] == 'association') 
				{
					$association->setId($parent['id']);
					$association->setRight($parent['right']);
					$association->setLeft($parent['left']);

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

					$listAssos[$association->getId()] = $associations;
				}
			}
		}
	}
}

?>