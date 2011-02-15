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
 class my extends OrHtml{
 	function __construct(){
 		parent:: __construct();
		$ajax = new OrAjax();
		$this->set_script_src($ajax->OP_[ajax_src]->get());
		$this->set_script($ajax->require_tooltip());
		$this->set_script($ajax->require_accordion());
		$this->set_ccs_src($ajax->require_accordion_css());
		$accordion = new OrAccordionAjax('main');
 		$textbox = new OrTextbox('textbox');
 		$selectbox = new OrSelectbox('selectbox');
 		$label = new OrLabel('label');
 		$textarea = new OrTextarea('textarea');
		$textarea2 = clone($textarea);
		$textarea->OP_[default_value]->set('ข้อความต่างๆ ที่ต้องการ');
 		$image = new OrImage('image');
 		$this->set_body($accordion->get_tag() . '<br>');
		$this->set_body($textbox->get_tag() . '<br>');
 		$this->set_body($selectbox->get_tag('ทดสอบ') . '<br>');
 		$this->set_body($label->get_tag('ทดสอบ') . '<br>');
 		$this->set_body($textarea->get_tag() . '<br>');
		$this->set_body($textarea2->get_tag() . '<br>');
 		$this->set_body($image->get_tag('../skins/default/image/icon/emblem-keys.png' , 'ทดสอบ') . '<br>');
 		$this->show();
 	}		
 }
 $my = new my();
?>
