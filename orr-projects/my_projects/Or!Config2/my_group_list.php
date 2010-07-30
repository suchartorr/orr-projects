<?php
/******************************************************************
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * กรุณาตรวจสอบ
 * ค่าใน config.inc.php ให้ถูกต้อง
 * กำหนดข้อมูลของโปรแกรม
 * กำหนดเขตข้อมูล
 *******************************************************************/
 
require_once('my_subpage.cls.php');

class my extends my_subpage {
	function __construct()
	{
		parent:: __construct();
		$this->set_skin_ccs("my_list.css");
		$this->set_skin_ccs("my_group_list.css");
		/*
		 * กำหนดคุณสมบัติของหน้าจอดังนี้
		 * $sql : คำสั่ง SQL
		 */
		$sql = "SELECT * FROM `my_group`";
		
		$my_form = new OrDbFrmList('my_form' , $this->get_my_db() );
                $my_form->OP_[edit_page_url]->set('my_group.php');
                //$my_form->OP_[edit_field_link]->set('user');
                //$my_form->OP_[edit_key_field]->set('id');
		$my_form->OE_[current_record]->set("include('my_group_list.OE_current_record.php');");
		
		/*
		 * สร้าง Control ในฟอร์ม ประกอบด้วย Class ในกลุ่ม GUI
		 */
		
		$my_form->set_controls(new OrLabel('group'));
		$my_form->set_controls(new OrLabel('user'));
		$my_form->set_controls(new OrLabel('description'));
		
		/*
		 * ตัวอย่างการสร้าง controls textbox ความกว้าง 10 ฟิลด์ชื่อ name
		 * $my_form->set_controls(new OrTextbox('name'));
		 * $my_form->controls[name]->set_size(10);
		 * เพิ่ม control ต่อไว้ด้านล่างนี้
		 */
		
		/*
		 * กำหนดข้อมูลการคัดกรองข้อมูล ใหม่กรณีเกิดข้อผิดพลาด เช่น ฟิลด์ name เกิดจากคำสั่ง concat ดังดัวอย่าง
		 * $my_form->set_filter_name('name',"concat(`prefix`,`fname`, ' ' , `lname`)");
		 */
		 
		/*
		 * กระบวนการจัดการข้อมูลจากฐานข้อมูล
		 */
		$my_form->fetch_record($sql);
		/*
		 * กำหนดส่วนหัวของฟอร์ม ปกติจะแสดงช่อง Filter สำหรับกรองข้อมูล
		 */
		 //$my_form->set_header('ค้นหา ' . $my_form->get_control_filter() .' เรียง ' . $my_form->get_control_order() . ' ' . $my_form->get_button_filter());
		 /*
		  * กำหนดฟอร์มลงในหน้า และแสดงหน้าจอ
		  */
		 $this->set_form( $my_form->get_tag());
		 $this->set_filter_msg( $my_form->OP_[cmd_msg]->get());
		 $this->show();
	}

}
$my = new my();
?>
