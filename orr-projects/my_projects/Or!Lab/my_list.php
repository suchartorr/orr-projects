<?php

/*
 * หน้าจอคัดรายการข้อมูลเพื่อให้ผู้ใช้งานเลือกรายการ
 * 1. ทดสอบการสร้างหน้าจอ
 * 2. ทดสอบการรับและส่งค่า ระหว่างโปรแกรม
 */
require_once('../../orr_lib/Or.php');
require_once('config.inc.php');
/**
 * Class สร้างหน้าจอ HTML
 * @package    Or!Lib
 * @author     Suchart Bunhachirat <suchart.orr@gmail.com>
 * @copyright  1997-2005 The PHP Group
 * @license
 * @version    2554
 */
class my_page extends OrHtml {

    function __construct($title = '') {
        global $my_cfg;
        parent::__construct($title);
        $this->set_skin($my_cfg[skins_path] . 'default_list.html');
    }

}

$my = new my_page('Orr-projects รายการข้อมูล');
$my->show();
?>
<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
