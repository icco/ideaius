<?php 
/* SVN FILE: $Id$ */
/* Wiki Fixture generated on: 2008-08-09 17:08:37 : 1218327817*/

class WikiFixture extends CakeTestFixture {
	var $name = 'Wiki';
	var $fields = array(
			'ID' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
			'pID' => array('type'=>'integer', 'null' => false, 'length' => 20),
			'content' => array('type'=>'text', 'null' => false),
			'date' => array('type'=>'datetime', 'null' => false),
			'uID' => array('type'=>'integer', 'null' => false, 'length' => 20),
			'indexes' => array('PRIMARY' => array('column' => 'ID', 'unique' => 1))
			);
	var $records = array(array(
			'ID'  => 1,
			'pID'  => 1,
			'content'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,
									phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,
									vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,
									feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.
									Orci aliquet, in lorem et velit maecenas luctus, wisi nulla at, mauris nam ut a, lorem et et elit eu.
									Sed dui facilisi, adipiscing mollis lacus congue integer, faucibus consectetuer eros amet sit sit,
									magna dolor posuere. Placeat et, ac occaecat rutrum ante ut fusce. Sit velit sit porttitor non enim purus,
									id semper consectetuer justo enim, nulla etiam quis justo condimentum vel, malesuada ligula arcu. Nisl neque,
									ligula cras suscipit nunc eget, et tellus in varius urna odio est. Fuga urna dis metus euismod laoreet orci,
									litora luctus suspendisse sed id luctus ut. Pede volutpat quam vitae, ut ornare wisi. Velit dis tincidunt,
									pede vel eleifend nec curabitur dui pellentesque, volutpat taciti aliquet vivamus viverra, eget tellus ut
									feugiat lacinia mauris sed, lacinia et felis.',
			'date'  => '2008-08-09 17:23:37',
			'uID'  => 1
			));
}
?>