<?php
class Post extends AppModel {

	var $name = 'Post';
	var $primaryKey = 'ID';
	var $validate = array(
		'ID' => array('numeric'),
		'time' => array('date'),
		'user' => array('numeric'),
		'wikiptr' => array('numeric'),
		'cID' => array('numeric')
	);

}
?>