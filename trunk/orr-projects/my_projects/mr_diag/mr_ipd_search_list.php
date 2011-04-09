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
		$sql = "SELECT `ipd_admit`.`hn`, CONCAT( `prefix`, `fname`, '   ', `lname` ) AS `name`, `patient`.`sex`, `ipd_admit`.`an`, `ipd_admit`.`admit_date`, `ipd_admit`.`admit_time`, `ipd_admit`.`discharge_date`, `ipd_admit`.`discharge_time`,`ipd_admit`.`length_of_stay` FROM `theptarin_utf8`.`ipd_admit` AS `ipd_admit`, `theptarin_utf8`.`patient` AS `patient` WHERE `ipd_admit`.`hn` = `patient`.`hn`";//<-กำหนดคำสั่ง SQL";//<-กำหนดคำสั่ง SQL
		$val_msg = $val_->message;
		
		$my_form = new OrDbFrmList('my_form' , $this->get_my_db() );
                //$my_form->OP_[edit_page_url]->set('_.php');//กำหนด URL ของหน้าแก้ไขข้อมูล
                //$my_form->OP_[edit_field_link]->set('id');//กำหนด ชื่อ Field ที่ต้องการให้เป็น Link หนาแก้ไขข้อมูล
                //$my_form->OP_[edit_key_field]->set('id'); //กำหนด ชื่อ Field ที่เป็นคีย์แก้ไข
                
		/*
		 * กำหนดคำสั่งที่ต้องในเหตุการณ์ของ Form เช่น on current record โดยปกติจากสร้างไฟล์เก็บคำสั่งไว้
		 * โดยใช้ [ชื่อไฟล์โปรแกรม] .[ชื่อเหตุการณ์] เช่น new_page_list.OE_current_record.php เป็นต้น
		 * สามารถดูรายละเอียดได้ในไฟล์ดังกล่าว
		 */
		//$my_form->OE_[current_record]->set("include('new_page_list.OE_current_record.php');");//<-แก้ไขถ้าต้องการใช้คำสั่งตามเหตุการณ์
		$my_form->OE_[current_record]->set("include('mr_ipd_search_list.OE_current_record.php');");
		/*
		 * สร้าง Control ในฟอร์ม โดยปกติจะใช้ class OrLabel
		 * ตามตัวอย่างประกอบด้วยฟิลด์ตามคำสั่ง SQL ในตาราง my_user
		 */
		
		//$my_form->set_controls(new OrLabel('id'));
		/*$my_form->set_controls(new OrLabel('visit_date'));
			$my_form->controls[visit_date]->set_format('th_date' , 'mysql');*/
		$my_form->set_controls(new OrLabel('hn'));
		$my_form->set_controls(new OrLabel('name'));
		$my_form->set_controls(new OrLabel('sex'));
		$my_form->set_controls(new OrLabel('an'));
		$my_form->set_controls(new OrLabel('admit_date'));
			$my_form->controls[admit_date]->set_format('th_date' , 'mysql');
		$my_form->set_controls(new OrLabel('admit_time'));
		$my_form->set_controls(new OrLabel('discharge_date'));
			$my_form->controls[discharge_date]->set_format('th_date' , 'mysql');
		$my_form->set_controls(new OrLabel('discharge_time'));
		$my_form->set_controls(new OrLabel('length_of_stay'));
		
		/*
		* กำหนดชนิด filter controls ตามตัวอย่างคำสั่ง
		* $my_form->set_filter_controls(new OrSelectbox('status'));
		* $my_form->set_filter_controls(new OrTextCalendar2('service_reg_date'));
		*/
		$my_form->set_filter_controls(new OrTextCalendar('admit_date'),true);
		$my_form->set_filter_controls(new OrTextCalendar('discharge_date'),true);
		$my_form->set_filter_controls(new OrTextbox('an'),true);
			$my_form->filter_controls[an]->set_size(10);
		$my_form->set_filter_controls(new OrTextbox('hn'),true);
			$my_form->filter_controls[hn]->set_size(10);
		/*
		 * กำหนด Function คำนวณการคำสั่ง SQL
		 * $my_form->set_total_function('id' , 'count');
		 */
		 
		 
		/*
		 * กำหนดข้อมูลการคัดกรองข้อมูล ใหม่กรณีเกิดข้อผิดพลาด เช่น ฟิลด์ name เกิดจากคำสั่ง concat ดังดัวอย่าง
		 * $my_form->set_filter_name('name',"concat(`prefix`,`fname`, ' ' , `lname`)");
		 */
		 $my_form->set_filter_name('hn',"`patient`.`hn`");
		 $my_form->set_filter_name('name',"CONCAT(`patient`.`fname`, '   ', `patient`.`lname` )");
		 //$my_form->set_filter_name('doc_name',"CONCAT(`doctor`.`prefix`, `doctor`.`fname`, '   ', `doctor`.`lname` )");
		
		/*
		 * กำหนดเงื่อนไขการเปรียบเทียบเริ่มต้น ฟิลด์ frequency ต้องให้เริ่มเปรียบเทียบด้วย = ให้กำหนดตามตัวอย่างด้านล่าง*/
		 $my_form->set_filter_compare('discharge_date',"=");
		 $my_form->set_filter_compare('hn',"=");	 
		 
		 
		/*
		 * กระบวนการจัดการข้อมูลจากฐานข้อมูล
		 */
		 $my_form->fetch_record($sql , $filter , $filter_msg , $reset);
		//$my_form->fetch_record($sql);
		/*
		 * กำหนดส่วนหัวของฟอร์ม ปกติจะแสดงช่อง Filter สำหรับกรองข้อมูล
		 */
		 $my_filter =$my_form->filter_controls[discharge_date]->OP_[caption]->get() . ' ' .$my_form->filter_controls[discharge_date]->get_tag();
		 $my_filter .='HN ' . ' ' .$my_form->filter_controls[hn]->get_tag();
		 //$my_filter .= ' - ' . ' ' .$my_form->filter_controls[kpi_id]->get_tag();
		 $my_form->set_header($my_filter);
		 //$my_form->set_header('This is Header.');
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
