<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ("my_page.cls.php");
require_once ("config.inc.php");

class my extends my_page{
    public function __construct($title = '') {
        parent::__construct($title);
        $this->show();
    }
}
$my = new my('หน้าทดสอบ Or!Lab');
?>
