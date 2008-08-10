<?php
class User extends AppModel {

	var $name = 'User';
	var $validate = array(
		'ID' => array('numeric'),
		'email' => array('email')
	);

}
?>