<?php
class Wiki extends AppModel {

	var $name = 'Wiki';
	var $validate = array(
		'ID' => array('numeric'),
		'pID' => array('numeric'),
		'date' => array('date'),
		'uID' => array('numeric')
	);

}
?>