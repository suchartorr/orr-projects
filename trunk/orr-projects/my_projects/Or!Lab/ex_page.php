<?php

/*
 * ตัวอย่างการสร้างหน้าจอ HTML
 */
require_once('../../orr_lib/Or.php');
require_once('config.inc.php');

class my_page extends OrHtml {

    function __construct($title = '') {
        global $my_cfg;
        parent::__construct($title);
        //$this->set_skin($my_cfg[skins_path] .'default.html');
        $txt_search = new OrDojoTextSearch('txt_search');    
        $txt_search->OP_[popup_url]->set('ex_page_popup.php');
        $txt_search->OP_[popup_id]->set('win_popup');
        $this->set_body("ทดสอบการใช้ Controls");
        $this->set_body('<br>' . $txt_search->get_tag());
        $this->show();
    }

}

$my = new my_page('ตัวอย่างการสร้างหน้าจอ HTML');
?>
