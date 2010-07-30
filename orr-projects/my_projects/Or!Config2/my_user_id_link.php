<?php
/**
 * Created on Mar 3, 2007
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * Tooltip แสดงรายการข้อมูลที่เกี่ยวข้อง
 */
require_once ('./Or!Lib/Or.php');
class my_link extends OrHtml {
	function __construct() {
		parent:: __construct();
		$val_ = new OrSysvalue();
		$val_filter = $val_->filter;
		$my_can_list = '<a href="my_can_list.php?val_filter[user]=' . $val_filter[user] . '&val_compare[user]==&val_msg[btn_filter]=Filter" target="_blank" >รายงานผู้มีสิทธิ์ใช้ระบบ</a><br>';
		$my_activity_list = '<a href="my_activity_list.php?val_filter[sec_user]=' . $val_filter[user] . '&val_compare[sec_user]==&val_msg[btn_filter]=Filter" target="_blank" >รายงานกิจกรรม</a><br>';
		$this->set_body('ข้อมูลที่เกี่ยวข้อง<br>');
		$this->set_body($my_can_list);
		$this->set_body($my_activity_list);
		$this->show();
	}
}
$my_link = new my_link();
?>
