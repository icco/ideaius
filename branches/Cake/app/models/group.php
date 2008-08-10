<?php
class Group extends AppModel {

	var $name = 'Group';
	var $validate = array(
		'ID' => array('numeric'),
		'pID' => array('numeric'),
		'usercount' => array('numeric')
	);

}
?>