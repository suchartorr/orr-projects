<?php
/**
 * Created on Mar 4, 2007 test_picture.php
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require_once('../Or!Lib/Or.php');
 class my extends OrPicture{
 	function __construct(){
 		parent:: __construct();
 		$this->set_image('../skins/default/image/other/p_orr_01.jpg');
		$this->show_resize();
 	}
 }
 $my = new my()
?>
