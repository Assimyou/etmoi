<?php

include_once 'model/classes/mother.php';

class user extends mother
{
	/**
	 * user wording
	 *
	 * @var string
	 */
	private $_wording;

	/**
	 * user left
	 *
	 * @var int
	 */
	private $_left;

	/**
	 * user right
	 *
	 * @var int
	 */
	private	$_right;

	/**
	 * user gap
	 *
	 * @var int
	 */
	private $_gap;

	/**
	 * user users
	 *
	 * @var users[]
	 */
	private $_users;

	const GAP = 2;

	function __construct($dbh)
	{
		$this->setDbh($dbh);

		$this->setGap(self::GAP);
	}

	public function add()
	{
		$this->setQuery($this->getDbh()->prepare("UPDATE user SET `right` = `right` + :gap WHERE `right` >= :left;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("UPDATE user SET `left` = `left` + :gap WHERE `left` >= :left;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("INSERT INTO user (`id` ,`wording` ,`left` ,`right`) VALUES (NULL ,:wording ,:left ,:right);"));
		$this->getQuery()->bindParam(':wording', $this->_wording, PDO::PARAM_STR);
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();
	}

	public function remove()
	{
		$this->setQuery($this->getDbh()->prepare("DELETE FROM user WHERE `left` >= :left AND `right` <= :right ORDER BY `right`;"));
		$this->getQuery()->bindParam(':left', $this->_left, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("UPDATE user SET `left` = `left` - :gap WHERE `left` >= :right;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();

		$this->setQuery($this->getDbh()->prepare("UPDATE user SET `right` = `right` - :gap WHERE `right` >= :right;"));
		$this->getQuery()->bindParam(':gap', $this->_gap, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();
	}

	public function update()
	{
		$this->setQuery($this->getDbh()->prepare("UPDATE user SET `wording` = :wording WHERE `right` = :right;"));
		$this->getQuery()->bindParam(':wording', $this->_wording, PDO::PARAM_INT);
		$this->getQuery()->bindParam(':right', $this->_right, PDO::PARAM_INT);
		$this->setResult($this->getQuery()->execute());
		$this->getQuery()->closeCursor();
	}

	public function selectChild()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM user WHERE `left` > :left AND `right` < :right;"));
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
				$this->_users[] = $this->_result;
			}
			$this->setResult($this->_users);
		}

		$this->getQuery()->closeCursor();
	}

	public function selectParent()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM user WHERE `left` < :left AND `right` > :right ORDER BY `right`;"));
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
				$this->_users[] = $this->_result;
			}
			$this->setResult($this->_users);
		}

		$this->getQuery()->closeCursor();
	}

	public function selectLastuser()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM user ORDER BY `right` DESC LIMIT 1"));
		$this->getQuery()->execute();

		$this->setResult($this->getQuery()->fetch(PDO::FETCH_ASSOC));

		$this->getQuery()->closeCursor();
	}

	public function selectuser()
	{
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM user WHERE `id` = :id LIMIT 1"));
		$this->getQuery()->bindParam(':id', $this->id, PDO::PARAM_INT);
		$this->getQuery()->execute();

		$this->setResult($this->getQuery()->fetch(PDO::FETCH_ASSOC));

		$this->getQuery()->closeCursor();
	}

	public function search($wording)	
	{
		$this->setWording('%'.$wording.'%');
		$this->setQuery($this->getDbh()->prepare("SELECT * FROM user WHERE `wording` LIKE :wording AND `right` - `left` = 1;"));
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
				$this->_users[] = $this->_result;
			}
			$this->setResult($this->_users);
		}

		$this->getQuery()->closeCursor();
	}

	/**
	 * Get user wording
	 *
	 * @return user_wording
	 */
	public function getWording()
	{
		return $this->_wording;
	}

	/**
	 * Set user wording
	 *
	 * @param user_wording
	 */
	public function setWording($wording)
	{
		$this->_wording = $wording;
	}

	/**
	 * Get user left
	 *
	 * @return user_left
	 */
	public function getLeft()
	{
		return $this->_left;
	}

	/**
	 * Set user left
	 *
	 * @param user_left
	 */
	public function setLeft($left)
	{
		$this->_left = $left;
	}

	/**
	 * Get user right
	 *
	 * @return user_riht
	 */
	public function getRight()
	{
		return $this->_right;
	}

	/**
	 * Set user right
	 *
	 * @param user_right
	 */
	public function setRight($right)
	{
		$this->_right = $right;
	}

	/**
	 * Get user gap
	 *
	 * @return user_gap
	 */
	public function getGap()
	{
		return $this->_gap;
	}

	/**
	 * Set user gap
	 *
	 * @param user_gap
	 */
	public function setGap($gap)
	{
		$this->_gap = $gap;
	}
}