<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../../orr_lib/Or.php');
require_once('config.inc.php');
class my_page extends OrHtml
{
    function __construct($title = ''){
        global $my_cfg;
        parent :: __construct($title,false);
        $this->set_skin($my_cfg[skins_path] .'default_dojo.html');
	return null;
    }
}
$my = new my_page('ทดสอบ');
$my->show();
?>
