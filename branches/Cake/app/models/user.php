<?php
class User extends AppModel {

	var $name = 'User';
	var $primaryKey = 'uID';
	var $validate = array(
		'uID' => array('numeric'),
		'uname' => array('notempty'),
		'email' => array('email'),
		'passwd' => array('notempty'),
		'bday' => array('date'),
		'created' => array('blank')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Post' => array('className' => 'Post',
								'foreignKey' => 'pID',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);

}
?>