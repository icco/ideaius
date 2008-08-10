<?php
class Post extends AppModel {

	var $name = 'Post';
	var $validate = array(
		'user' => array('numeric'),
		'cID' => array('numeric')
	);

}
?>
