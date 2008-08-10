<?php
class Post extends AppModel {

	var $name = 'Post';
	var $validate = array(
		'ID' => array('numeric'),
		'time' => array('date'),
		'user' => array('numeric'),
		'cID' => array('numeric')
	);

}
?>