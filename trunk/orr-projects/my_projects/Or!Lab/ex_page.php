<?php
/* 
 * ตัวอย่างการสร้างหน้าจอ HTML
 */
require_once('../../orr_lib/Or.php');
class my_page extends OrHtml {

    function __construct($title = '') {
        global $my_cfg;
        parent::__construct($title);
    }

}
$my = new my_page('ตัวอย่างการสร้างหน้าจอ HTML');
$my->set_body("ทดสอบ");
$my->show();
?>
