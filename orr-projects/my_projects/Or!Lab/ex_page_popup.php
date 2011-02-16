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
        $this->set_skin($my_cfg[skins_path] .'default.html');
        $txt_search = new OrDojoTextSearch('txt_search');
        $tag = $txt_search->get_tag();
        $this->skin->set_skin_tag('my_form' , $tag);
        $this->show();
    }

}

$my = new my_page('ตัวอย่างการสร้างหน้าจอ POPUP');
?>
