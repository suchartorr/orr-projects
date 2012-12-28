<?php
require_once('../../orr_lib/Or.php');
require_once('_config.inc.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_mobile
 *
 * @author orr
 */
class my_mobile extends OrHtml{
    function __construct($title = '') {
        parent::__construct($title);
        $this->set_skin($my_cfg[skins_path] .'default_mobile.html');//รูปแบบหน้าจอปกติ
    }
}

?>
