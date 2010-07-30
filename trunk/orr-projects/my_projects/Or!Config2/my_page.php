<?php
require_once('my_page.cls.php');

/**
 * Class ตัวอย่างการใช้ Class my_page สร้าง form เพื่อบันทึกแก้ไข ข้อมูลใน ฐานข้อมูล
 * Save as เพื่อแก้ไขใช้งาน ตามคำอธิบาย
 * @package    Or!Lib
 * @author     Suchart Bunhachirat <suchart_bu@yahoo.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    2550
 */
class my extends my_page
{
	/**
	 * กำหนดคุณสมบัติของหน้าจอ มีตัวแปรที่ต้องกำหนดค่าคือ
	 * $sql : คำสั่งเพื่อคัดข้อมูลจาก Table
	 * $table : ชื่อ Table
	 * $key_field : ชื่อ Field ที่เป็น PRIMARY
	 * $my_form : Object เพื่อจัดการเกี่ยวกับ Form และข้อมูล
	 * ตรวจสอบค่าใน config.inc.php มีค่าถูกต้อง
	 */
	function my()
	{
		$this->my_page();
		$this->set_skin_ccs("my_form.css");
		$val_ = new OrSysvalue();
		//$filter = new OrSql();
				
		/**
		 * กำหนดตัวแปร ใช้งาน
		 */
		$sql = 'SELECT * FROM `tbl_basic` ';
		$table = 'tbl_basic';
		$key_field = 'id';
		$val_msg = $val_->message;
		
		
		/**
		 * สร้าง Object เพื่อจัดการเกี่ยวกับ Form และ ข้อมูล จาก Class OrDbFrmForm
		 */
		$my_form = new OrDbFrmForm('my_form' , $this->get_my_db() , $table , $key_field , $this->get_skins_path('my_form.html') );
		$my_form->set_controls(new OrLabel('id'));
		$my_form->controls[id]->OP_[check_null]->set(false);

		$my_form->set_controls(new OrTextbox('name'));
		$my_form->controls[name]->set_size(20,50);
		
		$my_form->set_controls(new OrCheckbox('check') );
		$my_form->controls[check]->OP_[check_null]->set(false);
		$my_form->controls[check]->OP_[default_value]->set(1);
		
		$my_form->set_controls(new OrTextCalendar('begin_date') );
		$my_form->controls[begin_date]->OP_[check_null]->set(false);
		$my_form->controls[begin_date]->OP_[default_value]->set(date('Y-m-d'));
		
		$my_form->set_controls(new OrCheckbox('check1') );
		$my_form->controls[check1]->OP_[check_null]->set(false);
		$my_form->controls[check1]->OP_[auto_visible]->set(false);
		
		$my_form->set_controls(new OrCheckbox('check2') );
		$my_form->controls[check2]->OP_[check_null]->set(false);
		$my_form->controls[check2]->OP_[auto_visible]->set(false);
		/**
		 * สร้าง control เพิ่มสำหรับรับข้อมูล Filter
		 */
		$txt_filter = new OrTextbox( 'txt_filter' , 'val_msg[txt_filter]');
		$txt_filter->OP_[auto_post]->set(true);
		$txt_filter->set_size(20);
		
		$txt_sort_field = new OrSelectbox('txt_sort_field','val_msg[txt_sort_field]');
		$txt_sort_field->OP_[auto_post]->set(true);
		
		/*สร้างรายการ เลือกเพื่อจัดเรียงข้อมูล*/
		foreach($my_form->controls AS $control_id => $control){
			$my_fields[$control->OP_[caption]->get()] = $control_id; 
		}
		$txt_sort_field->OP_[option]->set(array_merge(array(''=>'') , $my_fields ));
		
		/**การ Filter ข้อมูล**/
		if($val_msg[btn_filter]=='Filter')
		{
			
			if($val_msg[txt_filter] != ''){
				$my_form->set_filter($val_msg[txt_filter]);
				$filter = $my_form->filter;
			}else{
				/**ค้นจาก Query**/
				if(is_array($val_filter))
				{
					$filter_msg .= ' ค้นจาก ';
					foreach($val_filter as $id => $value)
					{
						if($value != '')
						{
							$field_name = $id;
							if($id == 'name')
							{
								$field_name = "concat(`prefix`,`fname`, ' ' , `lname`)";
							}
						
							$filter->set_cmd_filter($field_name , $val_compare[$id] ,$value);
							$filter_msg .= ' ' . $my_form->controls[$id]->OP_[caption]->get() . ' ' . $val_compare[$id] . ' ' . $value;
						}
					}
				}
			}
			if($val_msg['txt_sort_field'] != ''){
				$sort_field = $val_msg['txt_sort_field'];
				$filter_msg .= ' เรียงตาม ';
				foreach($my_fields AS $caption => $id)
				{
					if($val_msg['txt_sort_field'] == $id)
					{
						$filter->set_cmd_order($id);
						$filter_msg .= ' ' . $caption . ' ';
					}
				}
			}
			
		}else if($val_msg[btn_filter]=='No Filter'){
			$reset=true;
		}
		
		/*****************************/
		$my_form->fetch_record($sql ,  $my_form->filter , $my_form->filter_msg , $reset);
		$my_form->controls[check]->OP_[description]->set($my_form->controls[check1]->get_tag() . ' ' . $my_form->controls[check2]->get_tag() );
		
		$my_form->set_header('ค้นหา ' . $txt_filter->get_tag() . ' เรียง ' . $txt_sort_field->get_tag() . ' ' . $my_form->get_button_filter());
		$my_message = 'ตัวอย่างการสร้างหน้าจอ บันทึกแก้ไข ข้อมูล';
		$this->set_form( $my_form->get_tag($this->get_skins_path('form_button.html')));
		$this->set_status( $my_form->OP_[message]->get() );
		$this->set_filter_msg( $my_form->OP_[cmd_msg]->get());
		$this->set_my_message( $my_message);
		 
		$this->show();
	}
}

/*สร้าง Object จาก Class my เพื่อแสดงหน้าจอ*/
$my = new my();
?>
