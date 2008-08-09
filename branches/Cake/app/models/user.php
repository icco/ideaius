<?php
class User extends AppModel {

	var $name = 'User';
	var $primaryKey = 'ID';
	var $validate = array(
		'ID' => array('numeric'),
		'RealName' => array('alphanumeric'),
		'uname' => array('alphanumeric'),
		'email' => array('email'),
		'passwd' => array('alphanumeric'),
		'bday' => array('date'),
		'created' => array('date')
	);

}
?>