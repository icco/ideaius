<?php
class User extends AppModel {

	var $name = 'User';
	var $validate = array(
		'ID' => array('numeric'),
		'email' => array('email')
	);
	
	function getName() {
		//Return a string with the users name in it
		
	}
}
?>