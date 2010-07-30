<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../../orr_lib/Or.php');
require_once('config.inc.php');

/**
 * Description of my_page
 *
 * @author orr
 */
class my_page extends OrHtml {
    //put your code here
    public  function  __construct($title = '') {
        global  $my_cfg;
        parent::__construct($title);
        $this->set_skin($my_cfg[skins_path] .'default.html');
	return null;
    }

    public  function  show() {
        parent::show();
        return NULL;
    }
}
?>
