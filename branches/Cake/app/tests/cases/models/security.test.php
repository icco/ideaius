<?php 
/* SVN FILE: $Id$ */
/* Security Test cases generated on: 2008-10-29 14:10:56 : 1225314116*/
App::import('Model', 'Security');

class TestSecurity extends Security {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class SecurityTestCase extends CakeTestCase {
	var $Security = null;
	var $fixtures = array('app.security', 'app.post', 'app.user', 'app.group');

	function start() {
		parent::start();
		$this->Security = new TestSecurity();
	}

	function testSecurityInstance() {
		$this->assertTrue(is_a($this->Security, 'Security'));
	}

	function testSecurityFind() {
		$this->Security->recursive = -1;
		$results = $this->Security->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Security' => array(
			'uID'  => 1,
			'gID'  => 1,
			'pID'  => 1,
			'permissions'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>