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
        $link = '<br>'.'<a href="JavaScript:return_to_opener()">Click เพื่อส่งค่า 123456 กลับไปที่ textbox</a>';
        //window.opener.document.frmTest.tbTest.value=strContent;
        //window.close();
        $this->set_body($link);
        $this->show();
    }

}

$my = new my_page('ตัวอย่างการสร้างหน้าจอ POPUP');
?>
