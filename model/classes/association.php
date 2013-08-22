<?php
/**
*	@category   model
*	@package    asssociation
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'mother.php';

class association extends mother
{
	private $_wording;

	private $_left;

	private	$_right;

	private $_gap;

	private $_associations;

	const GAP = 2;

	function __construct($dbh)
	{
		$this->setDbh($dbh);

		$this->setGap(self::GAP);
	}

	public function add()
	{
		$this->setQuery($this->getDbh()->prepare("UPDATE `association` SET `right` = `right` + :gap WHERE `right` >= :left;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("UPDATE `association` SET `left` = `left` + :gap WHERE `left` >= :left;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("INSERT INTO `association` (`id` ,`wording` ,`left` ,`right`) VALUES (NULL ,:wording ,:left ,:right);"));
		$this->getQuery()->bindParam(':wording', $this->_wording, PDO::PARAM_STR);
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();
	}

	public function remove()
	{
		$this->setQuery($this->getDbh()->prepare("DELETE FROM `association` WHERE `left` >= :left AND `right` <= :right ORDER BY `right`;"));
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("UPDATE `association` SET `left` = `left` - :gap WHERE `left` >= :right;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("UPDATE `association` SET `right` = `right` - :gap WHERE `right` >= :right;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();
	}

	public function update()
	{
		$this->setQuery($this->getDbh()->prepare("UPDATE `association` SET `wording` = :wording WHERE `right` = :right;"));
		$this->getQuery()->bindParam(':wording', $this->_wording, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();
	}

	public function selectChild()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM `association` WHERE `left` > :left AND `right` < :right;"));
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->getQuery()->execute();

		if ($this->getQuery()->rowCount() < 1) 
		{
			$this->setResult('');
		}
		else 
		{
			while ($this->_result = $this->getQuery()->fetch(PDO::FETCH_ASSOC))
			{
				$this->_associations[] = $this->_result;
			}
			$this->setResult($this->_associations);
		}

		$this->getQuery()->closeCursor();
	}

	public function selectParent()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM `association` WHERE `left` < :left AND `right` > :right ORDER BY `right`;"));
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->getQuery()->execute();

		if ($this->getQuery()->rowCount() < 1) 
		{
			$this->setResult('');
		}
		else 
		{
			while ($this->_result = $this->getQuery()->fetch(PDO::FETCH_ASSOC))
			{
				$this->_associations[] = $this->_result;
			}
			$this->setResult($this->_associations);
		}

		$this->getQuery()->closeCursor();
	}

	public function selectLastAsso()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM `association` ORDER BY `right` DESC LIMIT 1"));
		$this->getQuery()->execute();

		$this->setResult($this->getQuery()->fetch(PDO::FETCH_ASSOC));

		$this->getQuery()->closeCursor();
	}

	public function selectAsso()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM `association` WHERE `id` = :id LIMIT 1"));
		$this->getQuery()->bindParam(':id', $this->id, PDO::PARAM_INT);
		$this->getQuery()->execute();

		$this->setResult($this->getQuery()->fetch(PDO::FETCH_ASSOC));

		$this->getQuery()->closeCursor();
	}

	/**
	*	Select association by wording
	*	@param string wording
	*/
	public function search($wording)	
	{
		$this->setWording('%'.$wording.'%');
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM `association` WHERE `wording` LIKE :wording AND `right` - `left` = 1;"));
		$this->getQuery()->bindParam(':wording', $this->_wording, PDO::PARAM_STR);
		$this->getQuery()->execute();

		if ($this->getQuery()->rowCount() < 1) 
		{
			$this->setResult('');
		}
		else 
		{
			while ($this->_result = $this->getQuery()->fetch(PDO::FETCH_ASSOC))
			{
				$this->_associations[] = $this->_result;
			}
			$this->setResult($this->_associations);
		}

		$this->getQuery()->closeCursor();
	}

	public function getWording()
	{
		return $this->_wording;
	}

	public function setWording($wording)
	{
		$this->_wording = $wording;
	}

	public function getLeft()
	{
		return $this->_left;
	}

	public function setLeft($left)
	{
		$this->_left = $left;
	}

	public function getRight()
	{
		return $this->_right;
	}

	public function setRight($right)
	{
		$this->_right = $right;
	}

	public function getGap()
	{
		return $this->_gap;
	}

	public function setGap($gap)
	{
		$this->_gap = $gap;
	}
}
?>