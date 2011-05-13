<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ("my_page.cls.php");
require_once ("config.inc.php");

class my extends my_page {

    private $main_menu = null;

    public function __construct() {
        global $my_cfg;
        parent::__construct();
        $this->set_ip_reg();
        $this->set_skin($my_cfg[skins_path] . 'default_welcome.html'); //เรียกใช้รูปแบบหน้าจอ
        $this->set_caption('สารสนเทศ สมาชิก');
        $my_sec = new OrSec(false);
        $val_ = new OrSysvalue();
        $val_controls = $val_->controls;
        if ($val_controls[login] == 'login') {
            $my_sec->login($val_controls[user], $val_controls[pass]);
            if ($my_sec->OP_[user]->get() == '')
                header("Location:index.php"); //แก้ไขในอนาคตให้ไปที่หน้าสมัครสมาชิกใหม่








        }
        if ($val_controls[logout] == 'logout') {
            $my_sec->logout();
            header("Location:index.php");
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
            //
            $this->set_user_info('เข้าใช้ระบบ');
            $this->set_login($my_form->get_tag());
            $this->set_subpage('http://10.1.0.12/intranet/');
        } else {
            //header("Location:portal.php");
            $link_logout = '<a href="welcome.php?val_controls[logout]=logout" >ออกจากระบบ</a>';
            $this->set_user_info('ผู้ใช้ระบบ : ' . $my_sec->get_user_text());
            $this->set_login($my_sec->get_user_text() . '</b> [ <u>' . $my_sec->OP_[user]->get() . '</u> ] ต้องการ ->' . $link_logout);
            $this->set_subpage('http://10.1.0.12/intranet/');
            //$this->set_login(' ผู้ใช้ระบบ '.$my_sec->get_user_text() . '</b> [ <u>' . $my_sec->OP_[user]->get() . '</u> ] ');
        }
        /* ส่วนแสดงข้อมูลหน้าจอแรก */
        //$this->set_subpage('ฟอร์มข้อมูลหลัก');
        /* รายการเมนูหลัก */
        /* $src = "'http://www.facebook.com/'";
          $this->set_leading('<a href="javascript:change_subpage_src('. $src . ')">ดูแลระบบ</a>'); */
        $this->set_main_menu();
        $this->show();
    }

    public function set_main_menu() {
        $this->main_menu = new OrSkin('main_menu.html');
        $this->skin->set_skin_tag('my_main_menu', $this->main_menu->get_tag());
        return NULL;
    }

    /*
     * ลงทะเบียน IP เมื่อเริ่มเข้าใช้ระบบครั้งแรก
     * @param null
     * @return null
     * @access public
     */
    public function set_ip_reg() {
        global $SCRIPT_FILENAME, $REMOTE_ADDR, $my_cfg;
        $my_db = new OrMysql($my_cfg[db]);
        $my_script = basename($SCRIPT_FILENAME);
        $sql = "SELECT * FROM `my_registration`WHERE sec_ip='" . $REMOTE_ADDR . "';";
        $my_db->get_query($sql);
        if ($my_db->get_record()) {
            //มีข้อมูลการเข้าใช้งาน พร้อมใช้งานระบบแล้ว
        } else {
            //ไม่พบการใช้งาน IP นี้มาก่อนบันทึกลงทะเบียนไว้ในฐานข้อมูล เพื่อใช้งานต่อไป
            $sql = "INSERT INTO `my_registration` (`open_access`,`sec_user`, `sec_ip`,`sec_script`) VALUE(NOW(),'root','$REMOTE_ADDR','$my_script')";
            $my_db->get_query($sql);
        }
        if ($my_db->is_error()
            )$my_db->show_error();
        return NULL;
    }

}

$my = new my();
?>
