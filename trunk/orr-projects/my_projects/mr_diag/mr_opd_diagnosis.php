<?php

/******************************************************************
 * @version php5
 * @author Panusda Kotchapun
 * @copyright Copyright &copy; 2007, orr
 * ค่าใน config.inc.php ให้ถูกต้อง
 * กำหนดข้อมูลของโปรแกรม
 * กำหนดเขตข้อมูล
 *******************************************************************/

require_once ('my_page.cls.php');
require_once ('mr_diag.cls.php');
//require_once ("mr_opd_diagnosis_cls.php");

class my extends my_page {
	function __construct($visit_date,$name,$sex,$vn,$hn,$doctor_id)
	//function __construct()
	{
		parent:: __construct();
		global $my_cfg;
		$this->set_skin_ccs("my_form.css");
		$val_ = new OrSysvalue();
		$filter = new OrSql();
		/*
		 * กำหนดคุณสมบัติของหน้าจอดังนี้
		 * $table : ชื่อ Table
		 * $sql : คำสั่ง SQL
		 * $key : ชื่อ Field ที่เป็น PRIMARY
		 */
		$table = 'mr_discharge_summary';
		$sql = 'SELECT * FROM `' . $table .'` ';
		$sql.= " WHERE `iopd` = 'O'";
		$key = 'id';
		$val_msg = $val_->message;

		
		$my_form = new OrDbFrmForm('my_form' , $this->get_my_db() , $table ,$key);
                $my_form->OP_[list_page_url]->set('mr_opd_search_list.php');
                $my_form->OP_[column]->set(2);
		
                /*
		 * สร้าง Control ในฟอร์ม ประกอบด้วย Class ในกลุ่ม GUI
		 */
		$my_form->set_controls(new OrLabel('id'));
		$my_form->controls[id]->OP_[check_null]->set(false);
		
		$my_form->set_controls(new OrLabel('  '),'',false);
		
		$my_form->set_controls(new OrLabel('visit_date'));
                        //$my_form->controls[visit_date]->OP_[auto_post]->set(TRUE);
                        $my_form->controls[visit_date]->OP_[default_value]->set($visit_date);
			$my_form->controls[visit_date]->set_format('th_date' , 'mysql');
		
		/*$my_form->set_controls(new OrTextCalendar('visit_date'),'วันที่');
			$my_form->controls[visit_date]->set_format('th_date' , 'mysql');
		 	$my_form->controls[visit_date]->OP_[default_value]->set(date('Y-m-d'));*/
			
		$my_form->set_controls(new OrLabel('iopd'));
			$my_form->controls['iopd']->OP_[default_value]->set('O');
			$my_form->controls['iopd']->OP_[text]->set('OPD');
		
		//$my_form->set_controls(new OrSelectbox('iopd'));
			//$my_form->controls[iopd]->OP_[option]->set(array('IPD'=>'I','OPD'=>'O')); 
		
		/*$my_form->set_controls(new OrTextbox('hn'),'HN');
			$my_form->controls[hn]->set_size(10);*/
			
		$my_form->set_controls(new label_hn('hn'));
                	$my_form->controls[hn]->OP_[default_value]->set($hn);
			
		$my_form->set_controls(new OrLabel('name'),'',false);
			$my_form->controls[name]->OP_[default_value]->set($name);
		//$my_form->set_controls(new OrLabel('age_year'),'อายุ',false);
		
		$my_form->set_controls(new OrLabel('sex'),'',false);
			$my_form->controls[sex]->OP_[default_value]->set($sex);
		
		$my_form->set_controls(new OrTextbox('age_year'),'อายุ');
			$my_form->controls[age_year]->OP_[check_null]->set(false);
			//$my_form->controls[age_year]->set_size(3);
			
		$my_form->set_controls(new OrLabel('vn'),'VN');
                	$my_form->controls[vn]->OP_[default_value]->set($vn);
		
		$my_form->set_controls(new OrLabel('              '),'',false);
		/*$my_form->set_controls(new OrTextbox('vn'),'VN');
			$my_form->controls[vn]->set_size(10);*/
			
		//$my_form->set_controls(new OrLabel('                   '),'',false);
		$my_form->set_controls(new OrLabel('Principal diagnosis'),'',false);
		$my_form->set_controls(new OrLabel(''),'',false);
		
		$my_form->set_controls(new OrDojoTextSearch('principal_diag1'),' 1 )');
			$my_form->controls[principal_diag1]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag1]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
                        $my_form->controls[principal_diag1]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag1]->set_size(30);
			$my_form->controls[principal_diag1]->OP_[check_null]->set(false);
			//$my_form->controls[principal_diag1]->OP_[auto_visible]->set(false);
		$my_form->set_controls(new OrLabel('name_e1'),'ชื่อโรค:',false);
						
		$my_form->set_controls(new OrDojoTextSearch('principal_diag2'),' 2 )');
			$my_form->controls[principal_diag2]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag2]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag2]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag2]->set_size(30);
			$my_form->controls[principal_diag2]->OP_[check_null]->set(false);
			//$my_form->controls[principal_diag2]->OP_[auto_visible]->set(false);
		$my_form->set_controls(new OrLabel('name_e2'),'ชื่อโรค:',false);
			
		$my_form->set_controls(new OrDojoTextSearch('principal_diag3'),' 3 )');
			$my_form->controls[principal_diag3]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag3]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag3]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag3]->set_size(30);
			$my_form->controls[principal_diag3]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('name_e3'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('principal_diag4'),' 4 )');
			$my_form->controls[principal_diag4]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag4]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag4]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag4]->set_size(30);
			$my_form->controls[principal_diag4]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('name_e4'),'ชื่อโรค:',false);
			
		$my_form->set_controls(new OrDojoTextSearch('principal_diag5'),' 5 )');
			$my_form->controls[principal_diag5]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag5]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag5]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag5]->set_size(30);
			$my_form->controls[principal_diag5]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('name_e5'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('principal_diag6'),' 6 )');
			$my_form->controls[principal_diag6]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag6]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag6]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag6]->set_size(30);
			$my_form->controls[principal_diag6]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('name_e6'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('principal_diag7'),' 7 )');
			$my_form->controls[principal_diag7]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag7]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag7]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag7]->set_size(30);
			$my_form->controls[principal_diag7]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('name_e7'),'ชื่อโรค:',false);
			
		$my_form->set_controls(new OrDojoTextSearch('principal_diag8'),' 8 )');
			$my_form->controls[principal_diag8]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag8]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag8]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag8]->set_size(30);
			$my_form->controls[principal_diag8]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('name_e8'),'ชื่อโรค:',false);
			
		$my_form->set_controls(new OrDojoTextSearch('principal_diag9'),' 9 )');
			$my_form->controls[principal_diag9]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag9]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag9]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag9]->set_size(30);
			$my_form->controls[principal_diag9]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('name_e9'),'ชื่อโรค:',false);
			
		$my_form->set_controls(new OrDojoTextSearch('principal_diag10'),' 10 )');
			$my_form->controls[principal_diag10]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag10]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag10]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag10]->set_size(30);
			$my_form->controls[principal_diag10]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('name_e10'),'ชื่อโรค:',false);
			
		$my_form->set_controls(new OrDojoTextSearch('external_cause'),'External cause (accident/toxic)');
			$my_form->controls[external_cause]->OP_[reg_exp]->set('^[WVXY]\d{2}(\.\d){0,1}$');
			$my_form->controls[external_cause]->OP_[invalid_message]->set('บันทึกได้เฉพาะรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[external_cause]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[external_cause]->set_size(30);
			$my_form->controls[external_cause]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('external_cause1'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrTextbox('signature1'),' Signature');
                $my_form->controls[signature1]->OP_[default_value]->set($doctor_id);
			$my_form->controls[signature1]->set_size(6,5);
			
		$my_form->set_controls(new OrLabel('signature1_1'),'ชื่อแพทย์:',false);
			
		/*$my_form->set_controls(new OrTextbox('request_user'),'ผู้บันทึก');
			$my_form->controls[request_user]->set_size(40);*/
		/*
		 * ตัวอย่างการสร้าง controls textbox ความกว้าง 10 ฟิลด์ชื่อ name
		 * $my_form->set_controls(new OrTextbox('name'));
		 * $my_form->controls[name]->set_size(10);
		 * เพิ่ม control ต่อไว้ด้านล่างนี้
		 */
		 
		 
		 //กำหนดข้อมูลการคัดกรองข้อมูล ใหม่กรณีเกิดข้อผิดพลาด เช่น ฟิลด์ name เกิดจากคำสั่ง concat ดังดัวอย่าง
		 //$my_form->set_filter_name('name',"concat(`prefix`,`fname`,'   ',`lname`,'  &nbsp;&nbsp;&nbsp;Sex ', `sex`)");
		 //$my_form->set_filter_name('age',"concat(`age_year`,'ปี', `age_month`)");
		
		/*
		 * กระบวนการจัดการข้อมูลจากฐานข้อมูล
		 */
		$my_form->fetch_record($sql);
		//$opd_name = new opd_name_option();
		//$my_form->controls[Principal_diagnosis]->OP_[description]->set('1)'.$my_form->controls[principal_diag1]->get_tag());
		
		
		/*$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `hn`, concat(`prefix`,`fname`,'  ',`lname`,' &nbsp;&nbsp;&nbsp; Sex : ', `sex`) AS name FROM `patient` WHERE `hn` = '" . $my_form->db->record[hn] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name]->OP_[value]->set($db->record[name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name]->OP_[value]->set('ไม่พบชื่อผู้ป่วย');
			
		}*/
		
		/*
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `hn`, `age_year`, `age_month` FROM `theptarin_utf8`.`patient_age` AS `patient_age` = '" . $my_form->db->record[age_year] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[age_year]->OP_[value]->set($db->record[age_year]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[age_year]->OP_[value]->set('ไม่พบอายุ');
			
		}*/
		
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag1] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e1]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e1]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag2] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e2]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e2]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag3] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e3]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e3]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag4] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e4]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e4]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag5] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e5]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e5]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag6] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e6]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e6]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag7] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e7]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e7]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag8] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e8]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e8]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag9] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e9]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e9]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[principal_diag10] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name_e10]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name_e10]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[external_cause] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[external_cause1]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[external_cause1]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}		
		$sql = "SELECT `doctor_code`, concat(`fname`,'  ',`lname`) AS doctor_name FROM `doctor` WHERE `doctor_code` = '" . $my_form->db->record[signature1] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[signature1_1]->OP_[value]->set($db->record[doctor_name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[signature1_1]->OP_[value]->set('ไม่พบชื่อแพทย์');
			
		}
		/*
		 * กำหนดส่วนหัวของฟอร์ม ปกติจะแสดงช่อง Filter สำหรับกรองข้อมูล
		 */
		 $my_form->set_header('ค้นหา ' . $my_form->get_control_filter() .' เรียง ' . $my_form->get_control_order() . ' ' . $my_form->get_button_filter());
		 /*
		  * กำหนดฟอร์มลงในหน้า และแสดงหน้าจอ
		  */
		 $this->set_form( $my_form->get_tag());
		 $this->set_filter_msg( $my_form->OP_[cmd_msg]->get());
		 $this->show();
	}

}
//$my = new my();
$my = new my($visit_date,$name,$sex,$vn,$hn,$doctor_id);
?>
