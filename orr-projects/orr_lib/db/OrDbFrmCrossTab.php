<?php
/**
 * Created on Mar 11, 2007 OrDbFormCrossTab.php
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * Form แสดงข้อมูลแบบ CrossTab
 */
class OrDbFrmCrossTab extends OrDbFrmList{
	private $cross_tab = null;
        private $data_format_type = 'currency';
        private $data_format_opt = 2;
	 function __construct($id, $db, $skin = null)
	 {
	 	parent :: __construct($id,$db, $skin);
	 	$this->cross_tab = new OrSqlCrossTab();
	 }
	 /**
	  * กำหนด Field Name ที่ต้องการใน Cross Tab
	  * @param string $col_field_name คอลัมน์ field
	  * @param string $data_filed_name ชื่อ Fied ข้อมูล
	  * @param string $data_function Function ที่ใช้คำนวณ
	  * @return null
	  */
	 function set_cross_tab($col_field_name , $data_field_name , $data_function = 'SUM'){
	 	$this->cross_tab->OP_[col_field_name]->set($col_field_name);
	 	$this->cross_tab->OP_[data_field_name]->set($data_field_name);
	 	$this->cross_tab->OP_[data_function]->set($data_function);
	 	return null;
	 }
	 
         function set_data_format($type,$opt){
                 $this->data_format_type = $type;
                 $this->data_format_opt = $opt;
                 return null;
         }
         
	 function set_cross_controls(){
	 	//$col_caption = $this->cross_tab->OP_[col_caption]->get();
	 	foreach($this->cross_tab->OP_[col_caption]->get() AS $id => $caption){
	 		$this->set_controls(new OrLabel($id) , $caption );
                        $this->controls[$id]->set_format($this->data_format_type , $this->data_format_opt);
	 	}
	 	
	 	foreach($this->cross_tab->OP_[col_function]->get() AS $id => $col_function){
	 		/**
	 		 * สร้าง Controls total function แต่ไม่ใส่ Function เพราะมี Function อยู่แล้ว
	 		 */
	 		$this->set_total_function($id ,'');
	 		$this->set_filter_name($id , $col_function);
	 	}
	 	
	 	return null;
	 }
	 
	 function set_row_controls(){
	 	foreach($this->cross_tab->OP_[row_total]->get() AS $id => $caption){
	 		echo $id . ' : ' . $caption . '<br>';
	 	}
	 }
	 
	 function fetch_record($sql, $filter = null, $filter_msg = '', $reset = false) {
	 	$sql = $this->cross_tab->get_sql($this->db , $sql);
	 	$this->set_cross_controls();
	 	parent :: fetch_record($sql, $filter , $filter_msg , $reset );
	 }
	 
	 function get_list_tag(){
	 	parent :: get_list_tag();
	 	$my_table = $this->tbl_list;
	 	
	 	foreach($this->controls AS $control_id => $control){
	 		$id = '_'.$control_id;
	 		if(array_key_exists($id ,$this->total_controls)){
	 			$value = $this->total_controls[$id]->get_tag();
	 		}else{
	 			$value = '<i>Total ' . $this->cross_tab->OP_[data_function]->get(). '</i>';
	 		}
	 		$my_table->set_col($value , 'td_' . $control_id);
	 	}
	 	$my_table->set_row('tr_body_total');
	 	return $my_table->get_tag();
	 }
}
?>
