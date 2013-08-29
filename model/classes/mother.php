<?php
/**
*	@category   model
*	@package    mother
*	@copyright  Copyright (c) 2013 BiereStorming 
*	@license    BiereStroming
*	@version    2013-07-13
*/

class mother
{
	protected $id;

	protected $dbh;

	protected $query;

	protected $result;

	public function getId()
	{
		return $this->id;
	}

	public function SetId($id)
	{
		$this->id = $id;
	}

	public function getDbh()
	{
		return $this->dbh;
	}

	public function setDbh($dbh)
	{
		$this->dbh = $dbh;
	}

	public function getQuery()
	{
		return $this->query;
	}

	public function setQuery($query)
	{
		$this->query = $query;
	}

	public function getResult()
	{
		return $this->result;
	}

	public function setResult($result)
	{
		$this->result = $result;
	}
}
?>