<?php
/**
 * Created on Mar 4, 2007 test_gui.php
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require_once('../Or!Lib/Or.php');
class test extends OrObj{
	public $i;
	function __construct() {
		$this->property('string' , 'string' ,'ค่าเริ่มต้น test_string');
		$this->i = 0;
	}
}
$my_test = new test();
$my_test2 = clone($my_test);
$my_test3 = $my_test;
$my_test->i = 5;
$my_test->OP_[string]->set('ค่าที่กำหนดใหม่ $my_test');
echo 'my_test property i = ' . $my_test->i . '<br>';
echo 'my_test property string = ' . $my_test->OP_[string]->get() . '<br>';
echo 'my_test2 property i = ' . $my_test2->i . '<br>';
echo 'my_test2 property string = ' . $my_test2->OP_[string]->get() . '<br>';
echo 'my_test3 property i = ' . $my_test3->i . '<br>';
?>
