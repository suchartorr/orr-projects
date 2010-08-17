<?php
/******************************************************************
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * กรุณาตรวจสอบ
 * ค่าใน config.inc.php ให้ถูกต้อง
 * กำหนดข้อมูลของโปรแกรม
 * กำหนดเขตข้อมูล
 * ตัวอย่างการเขียนเพื่อแสดงข้อมูลแบบรายงาน
 *******************************************************************/
 
require_once('my_page.cls.php');

class my extends my_page {
	function __construct()
	{
		parent:: __construct();
		$this->set_skin_ccs("my_list.css");
		/*
		 * กำหนดไฟล์ css ที่ใช้กำหนดความกว้างในแต่ละช่องข้อมูล
		 * โดยปกติจะตั้งชื่อเดียวกับ ชื่อไฟล์โปรแกรมแต่มีนามสกุลเป็น .css
		 * อ่านรายละเอียด การกำหนดค่าได้ในไฟล์ new_page_list.css
		 */
		$this->set_skin_ccs("new_page_list.css");//<-กำหนดชื่อไฟล์ css
		/*
		 * กำหนดคำสั่ง SQL ที่ใช้ในการแสดงข้อมูลในฐานข้อมูล ในดัวแปร $sql
		 * ตัวอย่างเป็นแสดงข้อมูลจากตาราง my_user
		 */
		$sql = "SELECT *  FROM `my_test`";//<-กำหนดคำสั่ง SQL
		
		$my_form = new OrDbFrmList('my_form' , $this->get_my_db() );
		/*
		 * กำหนดคำสั่งที่ต้องในเหตุการณ์ของ Form เช่น on current record โดยปกติจากสร้างไฟล์เก็บคำสั่งไว้
		 * โดยใช้ [ชื่อไฟล์โปรแกรม] .[ชื่อเหตุการณ์] เช่น new_page_list.OE_current_record.php เป็นต้น
		 * สามารถดูรายละเอียดได้ในไฟล์ดังกล่าว
		 */
		//$my_form->OE_[current_record]->set("include('new_page_list.OE_current_record.php');");//<-แก้ไขถ้าต้องการใช้คำสั่งตามเหตุการณ์
		
		/*
		 * สร้าง Control ในฟอร์ม โดยปกติจะใช้ class OrLabel
		 * ตามตัวอย่างประกอบด้วยฟิลด์ตามคำสั่ง SQL ในตาราง my_user
		 */
		
		$my_form->set_controls(new OrLabel('description'));
		$my_form->set_controls(new OrLabel('sec_time'));
		$my_form->set_controls(new OrLabel('sec_user'));
		$my_form->set_controls(new OrLabel('sec_ip'));
		$my_form->set_controls(new OrLabel('sec_script'));
		
		/*
		* กำหนดชนิด filter controls ตามตัวอย่างคำสั่ง
		* $my_form->set_filter_controls(new OrSelectbox('status'));
		*/
		
		//$my_form->set_filter_controls(new OrTextCalendar2('service_reg_date'));
		
		/*
		 * กำหนด Function คำนวณการคำสั่ง SQL
		 */
		 //$my_form->set_total_function('id' , 'count');
		/*
		 * กำหนดข้อมูลการคัดกรองข้อมูล ใหม่กรณีเกิดข้อผิดพลาด เช่น ฟิลด์ name เกิดจากคำสั่ง concat ดังดัวอย่าง
		 * $my_form->set_filter_name('name',"concat(`prefix`,`fname`, ' ' , `lname`)");
		 */
		 //$my_form->set_filter_name('name',"concat(`prefix`,`fname`, ' ' , `lname`)");//<-แก้ไขคำสั่งที่ใช้แทนเวลาที่กรองข้อมูล
		
		/*
		 * กระบวนการจัดการข้อมูลจากฐานข้อมูล
		 */
		$my_form->fetch_record($sql);
		/*
		 * กำหนดส่วนหัวของฟอร์ม ปกติจะแสดงช่อง Filter สำหรับกรองข้อมูล
		 */
		 //$my_form->set_header('ค้นหา ' . $my_form->get_control_filter() .' เรียง ' . $my_form->get_control_order() . ' ' . $my_form->get_button_filter());
		 /*
		  * กำหนดส่วนล่างของฟอร์ม กรณีที่ต้องการ เช่นแสดง ยอดรวม
		  */
		  //$my_form->set_footer($my_form->total_controls[conunt_id]->get_tag());
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