<?php
class Security extends AppModel {

	var $name = 'Security';
	var $primaryKey = 'pID';
	var $validate = array(
		'uID' => array('numeric'),
		'gID' => array('numeric'),
		'pID' => array('numeric'),
		'permissions' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'posts' => array('className' => 'Post',
								'foreignKey' => 'pID',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'user' => array('className' => 'user',
								'foreignKey' => 'uID',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Groups' => array('className' => 'Group',
								'foreignKey' => 'gID',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>