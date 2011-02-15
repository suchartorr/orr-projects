<?php

/*
 * ตัวอย่างการสร้างหน้าจอ HTML
 */
require_once('../../orr_lib/Or.php');

class my_page extends OrHtml {

    function __construct($title = '') {
        global $my_cfg;
        parent::__construct($title);
        $txt_search = new OrDojoTextSearch('txt_search');
        $this->set_body("ทดสอบการใช้ Controls");
        $this->set_body('<br>' . $txt_search->get_tag());
        $this->show();
    }

}

$my = new my_page('ตัวอย่างการสร้างหน้าจอ HTML');
?>
