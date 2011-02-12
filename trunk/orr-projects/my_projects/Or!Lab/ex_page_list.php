<?php
/* 
 * ตัวอย่างการสร้างโปรแกรมรายงานข้อมูล
 */
require_once('../../orr_lib/Or.php');
class my_page extends OrHtml {

    function __construct($title = '') {
        global $my_cfg;
        parent::__construct($title);
    }

}
$my = new my_page('ตัวอย่างโปรแกรมรายงานข้อมูล');
$my->set_body("ทดสอบ");
$my->show();
?>
