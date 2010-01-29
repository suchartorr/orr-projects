<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../../orr_lib/Or.php');
class my_page extends OrHtml
{
    function __construct(){
        parent :: __construct('MyPage',false);
	return null;
    }
}
$my = new my_page();
$my->show();
?>
