<?php 
/* SVN FILE: $Id$ */
/* TagsController Test cases generated on: 2008-08-09 17:08:33 : 1218327813*/
App::import('Controller', 'Tags');

class TestTags extends TagsController {
	var $autoRender = false;
}

class TagsControllerTest extends CakeTestCase {
	var $Tags = null;

	function setUp() {
		$this->Tags = new TestTags();
	}

	function testTagsControllerInstance() {
		$this->assertTrue(is_a($this->Tags, 'TagsController'));
	}

	function tearDown() {
		unset($this->Tags);
	}
}
?>