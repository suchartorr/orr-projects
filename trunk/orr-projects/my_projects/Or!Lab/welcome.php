<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ("my_page.cls.php");
require_once ("config.inc.php");

class my extends my_page {

    public function __construct($title = '') {
        global $my_cfg;
        parent::__construct($title);
        $this->set_caption('บันทึกเข้าใช้งาน');
        $my_sec = new OrSec(false);
        $val_ = new OrSysvalue();
        $val_controls = $val_->controls;
        if ($val_controls[login] == 'login'){
            $my_sec->login($val_controls[user], $val_controls[pass]);
        }
        if ($val_controls[logout] == 'logout'){
            $my_sec->logout();
        }

        
        
        if ($my_sec->OP_[user]->get() == '') {
            $my_form = new OrDojoForm('my_form');
            $my_form->set_controls(new OrDojoTextbox('user'));
            $my_form->controls[user]->set_size(10);
            $my_form->set_controls(new OrDojoTextbox('pass'));
            $my_form->controls[pass]->set_size(10);
            $my_form->controls[pass]->OP_[type]->set('password');
            $my_form->set_controls(new OrButton('login'));
            $my_form->set_skin($my_cfg[skins_path] . "frm_login.html");
            $my_form->skin->set_skin_tag('user', $my_form->controls[user]->get_tag());
            $my_form->skin->set_skin_tag('pass', $my_form->controls[pass]->get_tag());
            $my_form->skin->set_skin_tag('login', $my_form->controls[login]->get_tag('login'));
            $my_form->set_body($my_form->skin->get_tag());
            $this->set_form($my_form->get_tag());
        } else {
            //header("Location:portal.php");
            $my_form = new OrForm('my_form');
            $my_form->set_controls(new OrButton('logout'));
            $my_form->set_skin($my_cfg[skins_path] . "frm_logout.html");
            $my_form->skin->set_skin_tag('user_info', $my_sec->get_user_text() . '</b> [ <u>' . $my_sec->OP_[user]->get() . '</u> ] ');
            $my_form->skin->set_skin_tag('logout', $my_form->controls[logout]->get_tag('logout'));
            $my_form->set_body($my_form->skin->get_tag());
            $this->set_login(' ผู้ใช้ระบบ '.$my_sec->get_user_text() . '</b> [ <u>' . $my_sec->OP_[user]->get() . '</u> ] ');
        }
        
        
        $this->show();
    }

}
$my = new my('หน้าทดสอบ Or!Lab');
?>
