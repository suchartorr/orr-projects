<?php


/******************************************************************
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * กรุณาตรวจสอบค่าใน config.inc.php ให้ถูกต้อง
 *******************************************************************/

require_once ('my_page.cls.php');

class my extends my_page {
	function __construct() {
		parent :: __construct();
		$this->set_skin_ccs("my_form.css");
		$val_ = new OrSysvalue();
		$val_controls = $val_->controls;
		$my_sec = new OrSec();
		/*
		 * กำหนดคุณสมบัติของหน้าจอดังนี้
		 * $table : ชื่อ Table
		 * $sql : คำสั่ง SQL
		 * $key : ชื่อ Field ที่เป็น PRIMARY
		 */
		$user_name = $my_sec->OP_[user]->get();
		$table = 'or!config`.`my_user';
		$sql = "SELECT * FROM `" . $table . "` WHERE  `user` = '" . $my_sec->OP_[user]->get() . "'";
		$key = 'id';

		$my_form = new OrDbFrmForm('my_form', $this->get_my_db(), $table, $key);

		if ($val_controls[pass] != '') {
			$my_cmd = '$this->set_controls(new OrFieldHidden("val_pass") );';
			$my_cmd .= '$this->val_controls[db_field][val_pass] = md5("' . $val_controls[pass] . '");';
			$my_form->OE_[before_add]->set($my_cmd);
			$my_form->OE_[before_save]->set($my_cmd);
		}
		/*
		 * สร้าง Control ในฟอร์ม ประกอบด้วย Class ในกลุ่ม GUI
		 */
		$my_form->set_controls(new OrLabel('id'));
		$my_form->controls[id]->OP_[check_null]->set(false);

		$my_form->set_controls(new OrLabel('user'));

		$my_form->set_controls(new OrTextbox('pass'), 'รหัสผ่าน ', false);
		$my_form->controls[pass]->OP_[title]->set('ควรมีความยาวมากกว่า 6 ');
		$my_form->controls[pass]->set_size(10);
		$my_form->controls[pass]->OP_[password]->set(true);

		$my_form->set_controls(new OrSelectbox('status'));
		$my_form->controls[status]->OP_[option]->set(array (
			'0 Ok' => 0,
			'1 Cancel' => 1
		));

		$my_form->set_controls(new OrTextbox('prefix'));
		$my_form->controls[prefix]->set_size(10);

		$my_form->set_controls(new OrTextbox('fname'));
		$my_form->controls[fname]->set_size(20);

		$my_form->set_controls(new OrTextbox('lname'));
		$my_form->controls[lname]->set_size(20);

		/*
		 * กระบวนการจัดการข้อมูลจากฐานข้อมูล
		 */
		$my_form->fetch_record($sql);
		/*
		 * ขั้นตอนการทำงานหลังจัดการข้อมูล
		 */
		
		/*
		 * กำหนดส่วนหัวของฟอร์ม ปกติจะแสดงช่อง Filter สำหรับกรองข้อมูล
		 */
		//$my_form->set_header('ค้นหา ' . $my_form->get_control_filter() . ' เรียง ' . $my_form->get_control_order() . ' ' . $my_form->get_button_filter());
		/*
		 * กำหนดฟอร์มลงในหน้า และแสดงหน้าจอ
		 */
		$this->set_form($my_form->get_tag());
		$this->set_filter_msg($my_form->OP_[cmd_msg]->get());
		$this->show();
	}

}
$my = new my();
?>
