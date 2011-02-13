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
        //$this->set_skin($my_cfg[skins_path] . 'default_list.html');
        $sql = "SELECT * ,concat(`prefix`,`fname`, ' ' , `lname`) AS `name` FROM `my_user`"; //<-กำหนดคำสั่ง SQL
        $my_db = new OrMysql($my_cfg[db]);
        $my_form = new OrDbFrmList('my_form', $my_db);
        $my_form->OP_[edit_page_url]->set('_.php'); //กำหนด URL ของหน้าแก้ไขข้อมูล
        $my_form->OP_[edit_field_link]->set('id'); //กำหนด ชื่อ Field ที่ต้องการให้เป็น Link หนาแก้ไขข้อมูล
        $my_form->OP_[edit_key_field]->set('id'); //กำหนด ชื่อ Field ที่เป็นคีย์แก้ไข

        /*
         * กำหนดคำสั่งที่ต้องในเหตุการณ์ของ Form เช่น on current record โดยปกติจากสร้างไฟล์เก็บคำสั่งไว้
         * โดยใช้ [ชื่อไฟล์โปรแกรม] .[ชื่อเหตุการณ์] เช่น new_page_list.OE_current_record.php เป็นต้น
         * สามารถดูรายละเอียดได้ในไฟล์ดังกล่าว
         */
        //$my_form->OE_[current_record]->set("include('new_page_list.OE_current_record.php');");//<-แก้ไขถ้าต้องการใช้คำสั่งตามเหตุการณ์

        /*
         * สร้าง Control ในฟอร์ม โดยปกติจะใช้ class OrLabel
         * ตามตัวอย่างประกอบด้วยฟิลด์ตามคำสั่ง SQL ในตาราง my_user
         */

        $my_form->set_controls(new OrLabel('id'));
        $my_form->set_controls(new OrLabel('user'));
        $my_form->set_controls(new OrLabel('name'));
        $my_form->set_controls(new OrLabel('status'));

        /*
         * กำหนดชนิด filter controls ตามตัวอย่างคำสั่ง
         * $my_form->set_filter_controls(new OrSelectbox('status'));
         * $my_form->set_filter_controls(new OrTextCalendar2('service_reg_date'));
         */


        /*
         * กำหนด Function คำนวณการคำสั่ง SQL
         * $my_form->set_total_function('id' , 'count');
         */


        /*
         * กำหนดข้อมูลการคัดกรองข้อมูล ใหม่กรณีเกิดข้อผิดพลาด เช่น ฟิลด์ name เกิดจากคำสั่ง concat ดังดัวอย่าง
         * $my_form->set_filter_name('name',"concat(`prefix`,`fname`, ' ' , `lname`)");
         */


        /*
         * กำหนดเงื่อนไขการเปรียบเทียบเริ่มต้น ฟิลด์ frequency ต้องให้เริ่มเปรียบเทียบด้วย = ให้กำหนดตามตัวอย่างด้านล่าง
         * $my_form->set_filter_compare('frequency',"=");
         */


        /*
         * กระบวนการจัดการข้อมูลจากฐานข้อมูล
         */
        $my_form->fetch_record($sql);
        /*
         * กำหนดส่วนหัวของฟอร์ม ปกติจะแสดงช่อง Filter สำหรับกรองข้อมูล
         */
        //$my_form->set_header('This is Header.');
        /*
         * กำหนดส่วนล่างของฟอร์ม กรณีที่ต้องการ เช่นแสดง ยอดรวม
         */
        //$my_form->set_footer($my_form->total_controls[conunt_id]->get_tag());
        /*
         * กำหนดฟอร์มลงในหน้า และแสดงหน้าจอ
         */
        $this->set_body($my_form->get_tag());
        $this->set_body($my_form->OP_[cmd_msg]->get());
        $this->show();
    }

}

$my = new my_page('Orr-projects รายการข้อมูล');
?>
