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

class my extends my_page {
	function __construct($discharge_date,$hn,$name,$sex,$an)
	{
		parent:: __construct();
		global $my_cfg;
		$this->set_skin_ccs("my_form.css");
		//$val_ = new OrSysvalue();
		//$filter = new OrSql();
		/*
		 * กำหนดคุณสมบัติของหน้าจอดังนี้
		 * $table : ชื่อ Table
		 * $sql : คำสั่ง SQL
		 * $key : ชื่อ Field ที่เป็น PRIMARY
		 */
		$table = 'mr_discharge_summary';
		$sql = 'SELECT * FROM `' . $table .'` ';
		$sql.= " WHERE `iopd` = 'I'";
		//$sql.= " WHERE `iopd` = 'I' AND `id` = '" . $id . "'";
		$key = 'id';
		
		$my_form = new OrDbFrmForm('my_form' , $this->get_my_db() , $table ,$key);
                $my_form->OP_[list_page_url]->set('mr_ipd_search_list.php');
                $my_form->OP_[column]->set(2);
		
                /*
		 * สร้าง Control ในฟอร์ม ประกอบด้วย Class ในกลุ่ม GUI
		 */
		$my_form->set_controls(new OrLabel('id'));
			//$my_form->controls[id]->OP_[default_value]->set($id);
			$my_form->controls[id]->OP_[check_null]->set(false);
		
		$my_form->set_controls(new OrLabel(''),'',false);
		
		$my_form->set_controls(new OrLabel('discharge_date'),'วันที่ Disc.');
			$my_form->controls[discharge_date]->OP_[default_value]->set($discharge_date);
		 	$my_form->controls[discharge_date]->set_format('th_date' , 'mysql');
		
		//$my_form->set_controls(new OrLabel('iopd'));
			//$iopd = new iopd_option();
			//$my_form->controls['iopd']->OP_[default_value]->set('I');
			//$my_form->controls['iopd']->OP_[text]->set('IPD');
		
		//$my_form->set_controls(new OrSelectbox('iopd'));
			//$my_form->controls[iopd]->OP_[option]->set(array('IPD'=>'I','OPD'=>'O')); 
		$my_form->set_controls(new OrLabel('iopd'));
			$my_form->controls['iopd']->OP_[default_value]->set('I');
			$my_form->controls['iopd']->OP_[text]->set('IPD');
		  	
		
		$my_form->set_controls(new OrLabel('hn'));
		$my_form->controls[hn]->OP_[default_value]->set($hn);
		
		$my_form->set_controls(new OrLabel('name'),'',false);
			$my_form->controls[name]->OP_[default_value]->set($name);
		
		$my_form->set_controls(new OrLabel('sex'),'',false);
			$my_form->controls[sex]->OP_[default_value]->set($sex);
		
		$my_form->set_controls(new OrTextbox('age_year'),'อายุ');
			$my_form->controls[age_year]->OP_[check_null]->set(false);
			
		$my_form->set_controls(new OrLabel('an'),'AN');
		 $my_form->controls[an]->OP_[default_value]->set($an);
		 
		 $my_form->set_controls(new OrLabel('              '),'',false);
			//$my_form->controls[an]->set_size(12,10);
		/*******************************************/
		$my_form->set_controls(new OrLabel('Principal diagnosis'),'',false);
		$my_form->set_controls(new OrLabel(' '),'',false);
		
		$my_form->set_controls(new OrDojoTextSearch('principal_diag1'),' 1 )');
			$my_form->controls[principal_diag1]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[principal_diag1]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[principal_diag1]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[principal_diag1]->set_size(30);
			$my_form->controls[principal_diag1]->OP_[check_null]->set(false);
			//$my_form->controls[principal_diag1]->OP_[auto_visible]->set(false);
		$my_form->set_controls(new OrLabel('name_e1'),'ชื่อโรค:',false);
			//$my_form->controls[name_e]->OP_[auto_visible]->set(false);
			
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
		
		$my_form->set_controls(new OrLabel('Comorbidity'),'',false);
		$my_form->set_controls(new OrLabel('  '),'',false);
		/******************************************/
		$my_form->set_controls(new OrDojoTextSearch('comorbidity_diag1'),' 1 )');
			$my_form->controls[comorbidity_diag1]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[comorbidity_diag1]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[comorbidity_diag1]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[comorbidity_diag1]->set_size(30);
			$my_form->controls[comorbidity_diag1]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('comorbidity_1'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('comorbidity_diag2'),' 2 )');
			$my_form->controls[comorbidity_diag2]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[comorbidity_diag2]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[comorbidity_diag2]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[comorbidity_diag2]->set_size(30);
			$my_form->controls[comorbidity_diag2]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('comorbidity_2'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('comorbidity_diag3'),' 3 )');
			$my_form->controls[comorbidity_diag3]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[comorbidity_diag3]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[comorbidity_diag3]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[comorbidity_diag3]->set_size(30);
			$my_form->controls[comorbidity_diag3]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('comorbidity_3'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('comorbidity_diag4'),' 4 )');
			$my_form->controls[comorbidity_diag4]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[comorbidity_diag4]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[comorbidity_diag4]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[comorbidity_diag4]->set_size(30);
			$my_form->controls[comorbidity_diag4]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('comorbidity_4'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('comorbidity_diag5'),' 5 )');
			$my_form->controls[comorbidity_diag5]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[comorbidity_diag5]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[comorbidity_diag5]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[comorbidity_diag5]->set_size(30);
			$my_form->controls[comorbidity_diag5]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('comorbidity_5'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('comorbidity_diag6'),' 6 )');
			$my_form->controls[comorbidity_diag6]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[comorbidity_diag6]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[comorbidity_diag6]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[comorbidity_diag6]->set_size(30);
			$my_form->controls[comorbidity_diag6]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('comorbidity_6'),'ชื่อโรค:',false);
		
		/*********************************************/
		
		$my_form->set_controls(new OrLabel('complication'),'',false);
		$my_form->set_controls(new OrLabel('   '),'',false);
		
		$my_form->set_controls(new OrDojoTextSearch('complication_diag1'),' 1 )');
			$my_form->controls[complication_diag1]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[complication_diag1]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[complication_diag1]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[complication_diag1]->set_size(30);
			$my_form->controls[complication_diag1]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('complication_1'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('complication_diag2'),' 2 )');
			$my_form->controls[complication_diag2]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[complication_diag2]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[complication_diag2]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[complication_diag2]->set_size(30);
			$my_form->controls[complication_diag2]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('complication_2'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('complication_diag3'),' 3 )');
			$my_form->controls[complication_diag3]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[complication_diag3]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[complication_diag3]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[complication_diag3]->set_size(30);
			$my_form->controls[complication_diag3]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('complication_3'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('complication_diag4'),' 4 )');
			$my_form->controls[complication_diag4]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[complication_diag4]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[complication_diag4]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[complication_diag4]->set_size(30);
			$my_form->controls[complication_diag4]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('complication_4'),'ชื่อโรค:',false);
		
		/*********************************************/
		
		$my_form->set_controls(new OrLabel('Other diagnosis'),'',false);
		$my_form->set_controls(new OrLabel('    '),'',false);
		
		$my_form->set_controls(new OrDojoTextSearch('orther_diag1'),' 1 )');
			$my_form->controls[orther_diag1]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[orther_diag1]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[orther_diag1]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[orther_diag1]->set_size(30);
			$my_form->controls[orther_diag1]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('orther_1'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('orther_diag2'),' 2 )');
			$my_form->controls[orther_diag2]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[orther_diag2]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[orther_diag2]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[orther_diag2]->set_size(30);
			$my_form->controls[orther_diag2]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('orther_2'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('orther_diag3'),' 3 )');
			$my_form->controls[orther_diag3]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[orther_diag3]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[orther_diag3]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[orther_diag3]->set_size(30);
			$my_form->controls[orther_diag3]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('orther_3'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('orther_diag4'),' 4 )');
			$my_form->controls[orther_diag4]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[orther_diag4]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[orther_diag4]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[orther_diag4]->set_size(30);
			$my_form->controls[orther_diag4]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('orther_4'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('orther_diag5'),' 5 )');
			$my_form->controls[orther_diag5]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[orther_diag5]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[orther_diag5]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[orther_diag5]->set_size(30);
			$my_form->controls[orther_diag5]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('orther_5'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('orther_diag6'),' 6 )');
			$my_form->controls[orther_diag6]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[orther_diag6]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[orther_diag6]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[orther_diag6]->set_size(30);
			$my_form->controls[orther_diag6]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('orther_6'),'ชื่อโรค:',false);
		/********************************************/
		
		$my_form->set_controls(new OrDojoTextSearch('external_cause'),'External cause (accident/toxic)');
			$my_form->controls[external_cause]->OP_[reg_exp]->set('^[WVXY]\d{2}(\.\d){0,1}$');
			$my_form->controls[external_cause]->OP_[invalid_message]->set('บันทึกได้เฉพาะรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[external_cause]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[external_cause]->set_size(30);
			$my_form->controls[external_cause]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('external_cause1'),'ชื่อโรค:',false);
		
		/*********************************************/
		
		$my_form->set_controls(new OrLabel('Procedure/Operation'),'',false);
		$my_form->set_controls(new OrLabel('     '),'',false);
		
		$my_form->set_controls(new OrTextbox('procedure1'),' 1 )');
			$my_form->controls[procedure1]->set_size(50);
			$my_form->controls[procedure1]->OP_[check_null]->set(false);
		
		$my_form->set_controls(new OrTextCalendar('procedure_date1'),'Date');
		 	//$my_form->controls[procedure_date1]->OP_[default_value]->set(date('Y-m-d'));
			$my_form->controls[procedure_date1]->OP_[check_null]->set(false);
			
		$my_form->set_controls(new OrTextbox('procedure2'),' 2 )');
			$my_form->controls[procedure2]->set_size(50);
			$my_form->controls[procedure2]->OP_[check_null]->set(false);
		
		$my_form->set_controls(new OrTextCalendar('procedure_date2'),'Date');
		 	//$my_form->controls[procedure_date2]->OP_[default_value]->set(date('Y-m-d'));
			$my_form->controls[procedure_date2]->OP_[check_null]->set(false);
			
		$my_form->set_controls(new OrTextbox('procedure3'),' 3 )');
			$my_form->controls[procedure3]->set_size(50);
			$my_form->controls[procedure3]->OP_[check_null]->set(false);
		
		$my_form->set_controls(new OrTextCalendar('procedure_date3'),'Date');
		 	//$my_form->controls[procedure_date3]->OP_[default_value]->set(date('Y-m-d'));
			$my_form->controls[procedure_date3]->OP_[check_null]->set(false);
			
		$my_form->set_controls(new OrTextbox('procedure4'),' 4 )');
			$my_form->controls[procedure4]->set_size(50);
			$my_form->controls[procedure4]->OP_[check_null]->set(false);
		
		$my_form->set_controls(new OrTextCalendar('procedure_date4'),'Date');
		 	//$my_form->controls[procedure_date4]->OP_[default_value]->set(date('Y-m-d'));
			$my_form->controls[procedure_date4]->OP_[check_null]->set(false);
		
		/*********************************************/
		
		$my_form->set_controls(new OrLabel('Consultation'),'',false);
		$my_form->set_controls(new OrLabel('      '),'',false);
		
		$my_form->set_controls(new OrDojoTextSearch('consultation1'),' 1 )');
			$my_form->controls[consultation1]->OP_[popup_url]->set('mr_doctor_popup_list.php');
			$my_form->controls[consultation1]->set_size(21,20);
			$my_form->controls[consultation1]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('consultation_1'),'ชื่อแพทย์:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('consultation2'),' 2 )');
			$my_form->controls[consultation2]->OP_[popup_url]->set('mr_doctor_popup_list.php');
			$my_form->controls[consultation2]->set_size(21,20);
			$my_form->controls[consultation2]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('consultation_2'),'ชื่อแพทย์:',false);
	        
		$my_form->set_controls(new OrDojoTextSearch('consultation3'),' 3 )');
			$my_form->controls[consultation3]->OP_[popup_url]->set('mr_doctor_popup_list.php');
			$my_form->controls[consultation3]->set_size(21,20);
			$my_form->controls[consultation3]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('consultation_3'),'ชื่อแพทย์:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('consultation4'),' 4 )');
			$my_form->controls[consultation4]->OP_[popup_url]->set('mr_doctor_popup_list.php');
			$my_form->controls[consultation4]->set_size(21,20);
			$my_form->controls[consultation4]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('consultation_4'),'ชื่อแพทย์:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('consultation5'),' 5 )');
			$my_form->controls[consultation5]->OP_[popup_url]->set('mr_doctor_popup_list.php');
			$my_form->controls[consultation5]->set_size(21,20);
			$my_form->controls[consultation5]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('consultation_5'),'ชื่อแพทย์:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('consultation6'),' 6 )');
			$my_form->controls[consultation6]->OP_[popup_url]->set('mr_doctor_popup_list.php');
			$my_form->controls[consultation6]->set_size(21,20);
			$my_form->controls[consultation6]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('consultation_6'),'ชื่อแพทย์:',false);
		/********************************************/
		
		$my_form->set_controls(new OrTextarea('clinical_summary'));
			$my_form->controls[clinical_summary]->set_rowcol(4,60);
			$my_form->controls[clinical_summary]->OP_[check_null]->set(false);
		
		$my_form->set_controls(new OrLabel('       '),'',false);
		
		$my_form->set_controls(new OrSelectbox('dis_status_id'),'Discharge status');
			$my_form->controls[dis_status_id]->OP_[check_null]->set(false);
			$my_form->controls[dis_status_id]->OP_[option]->set($this->get_discharge_source());
			
		$my_form->set_controls(new OrSelectbox('dis_type_id'),'discharge type');
			$my_form->controls[dis_type_id]->OP_[check_null]->set(false);
			$my_form->controls[dis_type_id]->OP_[option]->set($this->get_discharge_type_source());
		
		$my_form->set_controls(new OrLabel('        '),'',false);
			
		$my_form->set_controls(new OrTextbox('orther_specify'),'other(specify)');
			$my_form->controls[orther_specify]->set_size(40);
			$my_form->controls[orther_specify]->OP_[check_null]->set(false);
		/********************************************/
		
		$my_form->set_controls(new OrLabel('Cause'),'Cause of death<br> 1.โรคที่เป็นสาเหตุการตาย',false);
		$my_form->set_controls(new OrLabel('         '),'',false);
		
		$my_form->set_controls(new OrDojoTextSearch('death1a'),'a)');
			$my_form->controls[death1a]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[death1a]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[death1a]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[death1a]->set_size(30);
			$my_form->controls[death1a]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('death1_a'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('death1b'),'b)');
			$my_form->controls[death1b]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[death1b]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[death1b]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[death1b]->set_size(30);
			$my_form->controls[death1b]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('death1_b'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('death1c'),'c)');
			$my_form->controls[death1c]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[death1c]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[death1c]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[death1c]->set_size(30);
			$my_form->controls[death1c]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('death1_c'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('death1d'),'d)');
			$my_form->controls[death1d]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[death1d]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[death1d]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[death1d]->set_size(30);
			$my_form->controls[death1d]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('death1_d'),'ชื่อโรค:',false);
		
		$my_form->set_controls(new OrDojoTextSearch('death2'),'2.โรคหรือภาวะอื่นที่เป็นเหตุหนุน');
			$my_form->controls[death2]->OP_[reg_exp]->set('^[^WwVvXxYy]\d{2}(\.\d){0,1}$');
			$my_form->controls[death2]->OP_[invalid_message]->set('ห้ามบันทึกรหัสโรคที่ขึ้นต้นด้วย W, V, X, Y');
			$my_form->controls[death2]->OP_[popup_url]->set('mr_opd_popup_list.php');
			$my_form->controls[death2]->set_size(30);
			$my_form->controls[death2]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('death_2'),'ชื่อโรค:',false);
		
		/********************************************/
		$my_form->set_controls(new OrDojoTextSearch('signature'),' Signature: ');
			$my_form->controls[signature]->OP_[popup_url]->set('mr_doctor_popup_list.php');
			$my_form->controls[signature]->set_size(21,20);
			$my_form->controls[signature]->OP_[check_null]->set(false);
		$my_form->set_controls(new OrLabel('signature_1'),'ชื่อแพทย์:',false);
					
		//$my_form->set_controls(new OrLabel('md'),'MD',false);
		/*
		 * ตัวอย่างการสร้าง controls textbox ความกว้าง 10 ฟิลด์ชื่อ name
		 * $my_form->set_controls(new OrTextbox('name'));
		 * $my_form->controls[name]->set_size(10);
		 * เพิ่ม control ต่อไว้ด้านล่างนี้
		 */
		 
		 
		 //กำหนดข้อมูลการคัดกรองข้อมูล ใหม่กรณีเกิดข้อผิดพลาด เช่น ฟิลด์ name เกิดจากคำสั่ง concat ดังดัวอย่าง
		 $my_form->set_filter_name('name',"concat(`prefix`,`fname`,'   ',`lname`,'  &nbsp;&nbsp;&nbsp;Sex ', `sex`)");
		
		/*
		 * กระบวนการจัดการข้อมูลจากฐานข้อมูล
		 */
		$my_form->fetch_record($sql);
		
		//$my_form->controls[Principal_diagnosis]->OP_[description]->set('1)'.$my_form->controls[principal_diag1]->get_tag());
		
		
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `hn`, concat(`prefix`,`fname`,'  ',`lname`,' &nbsp;&nbsp;&nbsp; Sex : ', `sex`) AS name FROM `patient` WHERE `hn` = '" . $my_form->db->record[hn] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[name]->OP_[value]->set($db->record[name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[name]->OP_[value]->set('ไม่พบชื่อผู้ป่วย');
			
		}
		
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
		/******************************************************************/
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[comorbidity_diag1] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[comorbidity_1]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[comorbidity_1]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[comorbidity_diag2] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[comorbidity_2]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[comorbidity_2]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[comorbidity_diag3] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[comorbidity_3]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[comorbidity_3]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[comorbidity_diag4] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[comorbidity_4]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[comorbidity_4]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[comorbidity_diag5] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[comorbidity_5]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[comorbidity_5]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[comorbidity_diag6] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[comorbidity_6]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[comorbidity_6]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		/***************************************/
		
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[complication_diag1] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[complication_1]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[complication_1]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[complication_diag2] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[complication_2]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[complication_2]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[complication_diag3] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[complication_3]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[complication_3]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[complication_diag4] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[complication_4]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[complication_4]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		/**************************************/
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[orther_diag1] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[orther_1]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[orther_1]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[orther_diag2] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[orther_2]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[orther_2]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[orther_diag3] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[orther_3]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[orther_3]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[orther_diag4] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[orther_4]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[orther_4]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[orther_diag5] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[orther_5]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[orther_5]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[orther_diag6] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[orther_6]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[orther_6]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		
		/**************************************/
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[external_cause] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[external_cause1]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[external_cause1]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		
		/*************************************/
		$sql = "SELECT `doctor_code`, concat(`fname`,'  ',`lname`) AS doctor_name FROM `doctor` WHERE `doctor_code` = '" . $my_form->db->record[consultation1] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[consultation_1]->OP_[value]->set($db->record[doctor_name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[consultation_1]->OP_[value]->set('ไม่พบชื่อแพทย์');
			
		}
		$sql = "SELECT `doctor_code`, concat(`fname`,'  ',`lname`) AS doctor_name FROM `doctor` WHERE `doctor_code` = '" . $my_form->db->record[consultation2] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[consultation_2]->OP_[value]->set($db->record[doctor_name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[consultation_2]->OP_[value]->set('ไม่พบชื่อแพทย์');
			
		}
		$sql = "SELECT `doctor_code`, concat(`fname`,'  ',`lname`) AS doctor_name FROM `doctor` WHERE `doctor_code` = '" . $my_form->db->record[consultation3] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[consultation_3]->OP_[value]->set($db->record[doctor_name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[consultation_3]->OP_[value]->set('ไม่พบชื่อแพทย์');
			
		}
		$sql = "SELECT `doctor_code`, concat(`fname`,'  ',`lname`) AS doctor_name FROM `doctor` WHERE `doctor_code` = '" . $my_form->db->record[consultation4] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[consultation_4]->OP_[value]->set($db->record[doctor_name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[consultation_4]->OP_[value]->set('ไม่พบชื่อแพทย์');
			
		}
		$sql = "SELECT `doctor_code`, concat(`fname`,'  ',`lname`) AS doctor_name FROM `doctor` WHERE `doctor_code` = '" . $my_form->db->record[consultation5] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[consultation_5]->OP_[value]->set($db->record[doctor_name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[consultation_5]->OP_[value]->set('ไม่พบชื่อแพทย์');
			
		}
		$sql = "SELECT `doctor_code`, concat(`fname`,'  ',`lname`) AS doctor_name FROM `doctor` WHERE `doctor_code` = '" . $my_form->db->record[consultation6] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[consultation_6]->OP_[value]->set($db->record[doctor_name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[consultation_6]->OP_[value]->set('ไม่พบชื่อแพทย์');
			
		}
		$sql = "SELECT `doctor_code`, concat(`fname`,'  ',`lname`) AS doctor_name FROM `doctor` WHERE `doctor_code` = '" . $my_form->db->record[signature] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[signature_1]->OP_[value]->set($db->record[doctor_name]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[lname]->OP_[text]->set($db->record[lname]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[signature_1]->OP_[value]->set('ไม่พบชื่อแพทย์');
			
		}
		/*****************************************************/
		
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[death1a] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[death1_a]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[death1_a]->OP_[value]->set('ไม่พบชื่อโรค'.'&nbsp;&nbsp;&nbsp;(due to)');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[death1b] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[death1_b]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[death1_b]->OP_[value]->set('ไม่พบชื่อโรค'.'&nbsp;&nbsp;&nbsp;(due to)');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[death1c] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[death1_c]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[death1_c]->OP_[value]->set('ไม่พบชื่อโรค'.'&nbsp;&nbsp;&nbsp;(due to)');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[death1d] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[death1_d]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[death1_d]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		$sql = "SELECT `code`, `name_e` FROM `mr_diag` WHERE `code` = '" . $my_form->db->record[death2] ."'";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		if($db->get_record()){
			$my_form->controls[death_2]->OP_[value]->set($db->record[name_e]);  // ถ้าเก็บค่าเป็น value จะสามารถเก็บค่าลงฐานข้อมูลได้
			//$this->controls[name_e]->OP_[text]->set($db->record[name_e]); // ถ้าเป็น text ให้แสดงเฉยๆ 
		
		}else{
			$my_form->controls[death_2]->OP_[value]->set('ไม่พบชื่อโรค');
			
		}
		
		/*****************************************************/
		
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
	function get_discharge_source(){
		global $my_cfg;
		/*รายการหน่วยงานในระบบ เรียงตามชื่อ ปนัสดา คชพันธ์ 03/08/2548*/
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		//ข้อมูลประเภทแพทย์
		$sql = "SELECT * FROM `mr_discharge_status` ORDER BY `name` ASC";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		while($db->get_record()){
			$my_value_list[$db->record[name]] = $db->record[id];
		}
		unset($db);
		return $my_value_list;
	}
	function get_discharge_type_source(){
		global $my_cfg;
		/*รายการหน่วยงานในระบบ เรียงตามชื่อ ปนัสดา คชพันธ์ 03/08/2548*/
		$db = new OrMysql($my_cfg[db]);//(กำหนด Object ฐานข้อมูลที่จะใช้)
		//ข้อมูลประเภทแพทย์
		$sql = "SELECT * FROM `mr_discharge_type` ORDER BY `name` ASC";//(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
		$db->get_query($sql);
		while($db->get_record()){
			$my_value_list[$db->record[name]] = $db->record[id];
		}
		unset($db);
		return $my_value_list;
	}

}
$my = new my($discharge_date,$hn,$name,$sex,$an);
?>
