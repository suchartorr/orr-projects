<?php

/*
 * หน้าจอสำหรับทดสอบการเขียนโปรแกรม
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
        $this->set_skin($my_cfg[skins_path] . 'default_testing.html');
    }

    function set_dialog(){
        $this->skin->set_skin_tag('my_dialog' , $tag);
        return null;
    }

}

$my = new my_page('Orr-projects ทดสอบโครงการ');
$my->show();
?>