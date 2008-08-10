<?php 
/* SVN FILE: $Id$ */
/* CategoriesController Test cases generated on: 2008-08-09 18:08:33 : 1218330393*/
App::import('Controller', 'Categories');

class TestCategories extends CategoriesController {
	var $autoRender = false;
}

class CategoriesControllerTest extends CakeTestCase {
	var $Categories = null;

	function setUp() {
		$this->Categories = new TestCategories();
	}

	function testCategoriesControllerInstance() {
		$this->assertTrue(is_a($this->Categories, 'CategoriesController'));
	}

	function tearDown() {
		unset($this->Categories);
	}
}
?>