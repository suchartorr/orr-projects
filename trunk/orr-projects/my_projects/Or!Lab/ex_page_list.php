<?php

/*
 * ตัวอย่างการสร้างโปรแกรมรายงานข้อมูล
 */
require_once('../../orr_lib/Or.php');
require_once('config.inc.php');

class my_page {

    function __construct($title = '') {
        global $my_cfg;
        $sql = "SELECT * ,concat(`prefix`,`fname`, ' ' , `lname`) AS `name` FROM `my_user`"; //<-กำหนดคำสั่ง SQL
        $my_db = new OrMysql($my_cfg[db]);
        $filter = new OrSql();
        //$my_form = new OrDbFrmList('my_form' , $my_db);
        $my_form = new OrDbFormList('my_form', '', 100);
        $my_form->set_db($my_db);
        /*
         * กำหนดคำสั่งที่ต้องในเหตุการณ์ของ Form เช่น on current record โดยปกติจากสร้างไฟล์เก็บคำสั่งไว้
         * โดยใช้ [ชื่อไฟล์โปรแกรม] .[ชื่อเหตุการณ์] เช่น new_page_list.OE_current_record.php เป็นต้น
         * สามารถดูรายละเอียดได้ในไฟล์ดังกล่าว
         */
        $my_form->OE_[current_record]->set("include('ex_page_list.OE_current_record.php');"); //<-แก้ไขถ้าต้องการใช้คำสั่งตามเหตุการณ์

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
        $my_form->fetch_record($sql, $filter);
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

        foreach ($my_form->get_list_tag() as $line) {
            echo $line;
        }

        //$this->set_body($my_form->OP_[cmd_msg]->get());
    }

}

$my = new my_page('ตัวอย่างโปรแกรมรายงานข้อมูล');
?>
