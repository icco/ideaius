<?php 
/* SVN FILE: $Id$ */
/* PostsController Test cases generated on: 2008-08-09 17:08:13 : 1218327793*/
App::import('Controller', 'Posts');

class TestPosts extends PostsController {
	var $autoRender = false;
}

class PostsControllerTest extends CakeTestCase {
	var $Posts = null;

	function setUp() {
		$this->Posts = new TestPosts();
	}

	function testPostsControllerInstance() {
		$this->assertTrue(is_a($this->Posts, 'PostsController'));
	}

	function tearDown() {
		unset($this->Posts);
	}
}
?>