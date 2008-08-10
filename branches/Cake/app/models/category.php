<?php
class Category extends AppModel {

	var $name = 'Category';
	var $validate = array(
		'ID' => array('numeric')
	);

}
?>