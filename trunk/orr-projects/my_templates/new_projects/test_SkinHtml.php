<?php
/**
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * ทดสอบ OrSkinHtml
 */
require_once('../Or!Lib/Or.php');
 class my extends OrSkinHtml{
         function __construct(){
                 parent :: __construct();
                 $this->OP_[title]->set('ทดสอบ skin html');
                 $this->set_body('ตัวอย่างการใช้ Class OrSkinHtml แทน OrHtml');
                 $this->set_body('<br>เพื่อให้ผู้เขียนโปรแกรมสะดวกในการจัดการ หน้าเพจ โดยใช้โปรแกรม HTML แก้ไขได้');
         }
 }
 $my = new my();
 $my->show();
?>
