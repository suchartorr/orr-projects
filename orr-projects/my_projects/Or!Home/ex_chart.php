<?php

/*
 * ตัวอย่างการสร้างหน้าจอ HTML
 */
require_once('../../orr_lib/Or.php');
require_once('config.inc.php');

class my_page extends OrDojoChart {

    function __construct($title = '') {
        global $my_cfg;
        parent::__construct($title);
        
        $this->show();
    }

}

$my = new my_page('ตัวอย่างการสร้างหน้าเพจแสดงกราฟ');
?>
