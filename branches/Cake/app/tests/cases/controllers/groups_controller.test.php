<?php 
/* SVN FILE: $Id$ */
/* GroupsController Test cases generated on: 2008-08-09 18:08:45 : 1218330405*/
App::import('Controller', 'Groups');

class TestGroups extends GroupsController {
	var $autoRender = false;
}

class GroupsControllerTest extends CakeTestCase {
	var $Groups = null;

	function setUp() {
		$this->Groups = new TestGroups();
	}

	function testGroupsControllerInstance() {
		$this->assertTrue(is_a($this->Groups, 'GroupsController'));
	}

	function tearDown() {
		unset($this->Groups);
	}
}
?>