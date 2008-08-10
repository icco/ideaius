<?php 
/* SVN FILE: $Id$ */
/* WikisController Test cases generated on: 2008-08-09 17:08:37 : 1218327817*/
App::import('Controller', 'Wikis');

class TestWikis extends WikisController {
	var $autoRender = false;
}

class WikisControllerTest extends CakeTestCase {
	var $Wikis = null;

	function setUp() {
		$this->Wikis = new TestWikis();
	}

	function testWikisControllerInstance() {
		$this->assertTrue(is_a($this->Wikis, 'WikisController'));
	}

	function tearDown() {
		unset($this->Wikis);
	}
}
?>