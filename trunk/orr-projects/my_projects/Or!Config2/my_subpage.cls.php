<?php
require_once('my_page.cls.php');
class my_subpage extends my_page
{
	function __construct($title = '' , $check = true){
		$this->my_page($title , $check);
	}
	
	function my_page($title )
	{
		global $my_cfg;
		$my_sec = new OrSec(false);
		$caption = $my_sec->OP_[title]->get();
		parent :: __construct($title);
		//$this->set_ccs_src($my_cfg[skins_path] . 'my_subpage.css');
		$this->set_skin($my_cfg[skins_path] .'my_subpage.html');
		$this->set_caption($caption);
	}
}
?>
