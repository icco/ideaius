<?php

class Node extends TohdohAppModel
{
	var $name = 'Node';
	
	var $useDbConfig = 'tohdoh';
	
	//var $hasMany = array('Child' => array('className'=>'Node','foreignKey'=>'parent_id','dependent'=>true));
	
	function findWithChildCount($id)
	{
		$db    = & ConnectionManager::getDataSource($this->useDbConfig);
		$table = $db->name($db->fullTableName('nodes'));
		
		$sql = "SELECT Node.*, " .
		 		"SUM(Child.type = 'L') as num_lists, " .
		 		"SUM(Child.done = 1 AND Child.type = 'T') as num_done, " .
				"SUM(Child.done = 0 AND Child.type = 'T') as num_undone " .
		 		"FROM $table Node LEFT JOIN $table Child ON Child.parent_id = Node.id " .
		 		"WHERE Node.parent_id = $id AND Node.done = 0 " .
		 		"GROUP BY Node.id " .
		 		"ORDER BY Node.type ASC, Node.position ASC";

		 return $db->query($sql);
	}
	
	function findPath($id)
	{
		static $path = array();
		
		if($id == 0) 
		{
			if(!empty($path) || count($path) > 1)
			{
				$path = array_reverse($path);
			}
			return $path;
		}
		
		$row = $this->find(array('Node.id'=>$id),array('Node.id','Node.parent_id','Node.name'));
		
		if(!$row) 
		{
			return array();
		}
		
		$path[] = $row;
		
		$parent_id = $row['Node']['parent_id'];
		
		return $this->findPath($parent_id);
		
	}
		
}
?>
