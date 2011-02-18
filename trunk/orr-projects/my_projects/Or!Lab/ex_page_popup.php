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
        $this->set_body("หน้าจอ popup");
        $link = '<br>'.'ทำลิงก์ ที่คืนค่ากลับ และปิดป็อบอัพ';
        $this->set_body($link);
        $this->show();
    }

}

$my = new my_page('ตัวอย่างการสร้างหน้าจอ POPUP');
?>
