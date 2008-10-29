<?php 
/* SVN FILE: $Id$ */
/* Security Fixture generated on: 2008-10-29 14:10:56 : 1225314116*/

class SecurityFixture extends CakeTestFixture {
	var $name = 'Security';
	var $table = 'securities';
	var $fields = array(
			'uID' => array('type'=>'integer', 'null' => false, 'length' => 20, 'key' => 'index'),
			'gID' => array('type'=>'integer', 'null' => false, 'length' => 20, 'key' => 'index'),
			'pID' => array('type'=>'integer', 'null' => false, 'length' => 20, 'key' => 'primary'),
			'permissions' => array('type'=>'integer', 'null' => false),
			'indexes' => array('PRIMARY' => array('column' => 'pID', 'unique' => 1), 'uID' => array('column' => 'uID', 'unique' => 0), 'gID' => array('column' => 'gID', 'unique' => 0))
			);
	var $records = array(array(
			'uID'  => 1,
			'gID'  => 1,
			'pID'  => 1,
			'permissions'  => 1
			));
}
?>