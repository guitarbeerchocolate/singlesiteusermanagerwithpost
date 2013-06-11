<?php
class post
{
	private $userid;
	private $db;
	function __construct($userid = NULL)
	{
		$this->db = new database;
		if(isset($userid))
		{
			$this->userid = $userid;
		}
	}

	function newpost($userid, $title, $thoughts)
	{
		$this->userid = $userid;
		$this->db->singleRow("INSERT INTO `post` (`userid`, `title`, `thoughts`) VALUES ('{$userid}','{$title}', '{$thoughts}')");
	}

	function respondingpost($respid, $userid, $title, $thoughts)
	{
		$this->userid = $userid;
		$this->db->singleRow("INSERT INTO `post` (`respid`, `userid`, `title`, `thoughts`) VALUES ('{$respid}','{$userid}','{$title}', '{$thoughts}')");
	}

	function getposts()
	{
		return $this->db->query("SELECT * FROM `post` WHERE `respid`='0' ORDER BY `created` DESC");
	}

	function getresponses($id)
	{
		return $this->db->query("SELECT * FROM `post` WHERE `respid`='{$id}' ORDER BY `created` DESC");
	}

	function __destruct()
	{
	
	}
}
?>