<?php
/* SVN FILE: $Id: vendors.php 1 2007-04-15 18:21:07Z phpnut $ */

/**
 * Short description for file.
 * 
 * This file includes js vendor-files from /vendor/ directory if they need to
 * be accessible to the public.
 *
 * PHP versions 4 and 5
 *
 * CakePHP :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright (c) 2006, Cake Software Foundation, Inc. 
 *                     1785 E. Sahara Avenue, Suite 490-204
 *                     Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource 
 * @copyright    Copyright (c) 2006, Cake Software Foundation, Inc.
 * @link         http://www.cakefoundation.org/projects/info/cakephp CakePHP Project
 * @package      cake
 * @subpackage   cake.public.js
 * @since        CakePHP v 0.2.9
 * @version      $Revision: 1 $
 * @modifiedby   $LastChangedBy: phpnut $
 * @lastmodified $Date: 2007-04-15 18:21:07 +0000 (dim., 15 avr. 2007) $
 * @license      http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * Enter description here...
 */
if(is_file('../../vendors/javascript/'.$_GET['file']) && (preg_match('/(.+)\\.js/', $_GET['file'])))
{
   readfile('../../vendors/javascript/'.$_GET['file']);
}

?>
