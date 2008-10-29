<?php
class Post extends AppModel {

	var $name = 'Post';
	var $primaryKey = 'pID';
	var $validate = array(
		'pID' => array('numeric'),
		'uID' => array('numeric'),
		'cID' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasOne = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'uID',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Category' => array('className' => 'Category',
								'foreignKey' => 'cID',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>
