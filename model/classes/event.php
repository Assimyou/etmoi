<?php
/**
*	@category   model
*	@package    event
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

include_once 'model/classes/mother.php';

class event extends mother
{
	private $_wording;

	private $_left;

	private	$_right;

	private $_gap;

	private $_events;

	const GAP = 2;

	function __construct($dbh)
	{
		$this->setDbh($dbh);

		$this->setGap(self::GAP);
	}

	public function add()
	{
		$this->setQuery($this->getDbh()->prepare("UPDATE event SET `right` = `right` + :gap WHERE `right` >= :left;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("UPDATE event SET `left` = `left` + :gap WHERE `left` >= :left;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("INSERT INTO event (`id` ,`wording` ,`left` ,`right`) VALUES (NULL ,:wording ,:left ,:right);"));
		$this->getQuery()->bindParam(':wording', $this->_wording, PDO::PARAM_STR);
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();
	}

	public function remove()
	{
		$this->setQuery($this->getDbh()->prepare("DELETE FROM event WHERE `left` >= :left AND `right` <= :right ORDER BY `right`;"));
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("UPDATE event SET `left` = `left` - :gap WHERE `left` >= :right;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("UPDATE event SET `right` = `right` - :gap WHERE `right` >= :right;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();
	}

	public function update()
	{
		$this->setQuery($this->getDbh()->prepare("UPDATE event SET `wording` = :wording WHERE `right` = :right;"));
		$this->getQuery()->bindParam(':wording', $this->_wording, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();
	}

	public function selectChild()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM event WHERE `left` > :left AND `right` < :right;"));
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
				$this->_events[] = $this->_result;
			}
			$this->setResult($this->_events);
		}

		$this->getQuery()->closeCursor();
	}

	public function selectParent()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM event WHERE `left` < :left AND `right` > :right ORDER BY `right`;"));
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
				$this->_events[] = $this->_result;
			}
			$this->setResult($this->_events);
		}

		$this->getQuery()->closeCursor();
	}

	public function selectLastEvent()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM event ORDER BY `right` DESC LIMIT 1"));
		$this->getQuery()->execute();

		$this->setResult($this->getQuery()->fetch(PDO::FETCH_ASSOC));

		$this->getQuery()->closeCursor();
	}

	public function selectEvent()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM event WHERE `id` = :id LIMIT 1"));
		$this->getQuery()->bindParam(':id', $this->id, PDO::PARAM_INT);
		$this->getQuery()->execute();

		$this->setResult($this->getQuery()->fetch(PDO::FETCH_ASSOC));

		$this->getQuery()->closeCursor();
	}

	/**
	*	Select event by wording
	*	@param string wording
	*/
	public function search($wording = NULL, $param = array(), $return = FALSE)	
	{
		if (!empty($param)) 
		{
			extract($param);
		}

		$this->setWording('%'.$wording.'%');
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM event WHERE `wording` LIKE :wording AND `right` - `left` = 1 ORDER BY `wording`;"));
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
				$this->_events[] = $this->_result;
			}
			$this->setResult($this->_events);
		}

		$this->getQuery()->closeCursor();

		if ($return == TRUE) 
		{
			return $this->getResult();
		}
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