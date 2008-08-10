<?php
class Post extends AppModel {

	var $name = 'Post';
	var $validate = array(
		'user' => array('numeric'),
		'cID' => array('numeric')
	);

	/**
	 * This should actually edit and save the data, not just barf and say it's 
	 * ok like a bad drunk.
	 */
	function save($incoming)
	{
		print "<pre>";
		print_r($incoming);
		print "</pre>";
		return true;
	}

}
?>
