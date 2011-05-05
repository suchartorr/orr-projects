<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../../orr_lib/Or.php');
require_once('config.inc.php');
/**
 * Class สำหรับรับส่งข้อมูลแบบ Ajax
 * @package    Or!Lib
 * @author     Suchart Bunhachirat <suchart.orr@gmail.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    2554
 */
//$my_sec = new OrSec();
$my_db = new OrMysql($my_cfg[db]); //(กำหนด Object ฐานข้อมูลที่จะใช้)
/*
 * กำหนดคำสั่งที่ส่งผลที่คัดจาก $content_key_value โดยคำสั่ง SQL ตามตัวอย่าง
 */
//$sql = "SELECT concat(`prefix`,`fname`, ' ' , `lname`) AS `name` FROM `my_user` WHERE `user` = '" . $content_key_value . "'"; //(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
$val_ = new OrSysvalue();
$my_form = new OrForm('my_ajax_form');
$sql = "SELECT `detail` FROM `my_note` WHERE `id` = '" . $val_->message[content_key_value] . "'"; //(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
$my_db->get_query($sql);
if ($my_db->get_record()) {
    $my_value = $my_db->record[detail];
} else {
    $my_value = $sql;
    //$my_value = 'ยังไม่มีเรื่องใหม่ๆ';
}
unset($my_db);

$my_content = new OrContent($my_value);
$my_content->show();
?>
