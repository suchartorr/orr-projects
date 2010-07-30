<?php
require_once ('./Or!Lib/Or.php');
class my_ajax extends OrHtml {
	function __construct() {
		parent:: __construct();
		$ajax = new OrAjax();
		$label = new OrLabel('label');
		$textbox = new OrTextbox('textbox');
		$selectbox = new OrSelectboxAjax('selectbox');
		
		$this->set_script_src($ajax->OP_[ajax_src]->get());
		$this->set_script($ajax->require_tooltip());
		$this->set_script($ajax->require_selectbox());
		$this->set_ccs_src($ajax->require_tooltip_css());
		$this->set_body($label->get_tag('ทดสอบ'));
		$this->set_body($textbox->get_tag());
		$this->set_body($selectbox->get_tag());
		$this->set_body('<span id="one" class="tt">text</span>');
		$this->set_body('<span dojoType="tooltip" connectId="textbox"><b>');
		$this->set_body('<span style="color: blue;">rich formatting</span>');
		$this->set_body('<span style="color: red; font-size: x-large;"><i>!</i></span>');
		$this->set_body('<span dojoType="tooltip" connectId="one" href="doc0.html" executeScripts="true" style="width: 300px;"></span>');
		$this->set_body('<span dojoType="tooltip" connectId="label_label" href="doc0.html" executeScripts="true" style="width: 400px;"></span>');
		$this->set_body('</b></span>');
		$this->show();
	}
}
$my_ajax = new my_ajax();
?>