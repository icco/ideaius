<?php
class Tag extends AppModel {

	var $name = 'Tag';
	var $validate = array(
		'ID' => array('numeric')
	);

}
?>