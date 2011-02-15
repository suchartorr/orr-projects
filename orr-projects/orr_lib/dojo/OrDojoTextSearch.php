<?php

/* * ****************************************************************
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * Class ช่องใส่ข้อมูลที่มีปุ่มกดค้นหาข้อมูล เป็นหน้าต่างใหม่
 * ***************************************************************** */

class OrDojoTextSearch extends OrDojoTextbox {

    /**
     * __construct : วิธีการทำงานเริ่มต้นของคลาส
     * @param string
     * @return null
     */
    function __construct($id, $name = null, $idx = null) {
        parent::__construct($id, $name, $idx);
        /*
         * การกำหนดคุณสมบัติ ของคลาส ใช้คำสั่ง
         * $this->property('ชื่อ' , 'ประเภทข้อมูล' ,'ค่าเริ่มต้น');
         */
        // $this->property('ajax_src','string','./dojo-0.4.1-ajax/dojo.js');
        /*
         * การกำหนดเหตุการณ์ ของคลาส ใช้คำสั่ง
         * $this->event('ชื่อเหตุการณ์');
         */
        //$this->event('on_load');
    }

    /**
     * __construct : วิธีการทำงานเริ่มต้นของคลาส
     * @param string
     * @return null
     */
   function get_tag($value = null) {
       $my_value = parent::get_tag($value);
       $btn_search = new OrDojoButton('btn_search');
       $my_value .= ' ' . $btn_search->get_tag('Search');
       return $my_value;
   }

    }
?>
