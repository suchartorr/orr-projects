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
         $this->property('popup_url','string'); //URL ที่เปิด
         $this->property('popup_id','string',$id);//ชื่อหน้าต่าง
         $this->property('popup_width','integer',800);//ความกว้างของหน้าต่าง
         $this->property('popup_hight','integer',600);//ความสูงของหน้าต่าง

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
       $url = $this->OP_[popup_url]->get();
       $id = $this->OP_[popup_id]->get();
       $width = $this->OP_[popup_width]->get();
       $hight = $this->OP_[popup_hight]->get();
       //$js_onclick = 'onClick="'."alert(window.document.frm_test.txt_search.value);" .'"';
       $search_value = 'window.document.my_form.' .  $this->OP_[id]->get() . '.value';
       $js_onclick = 'onClick="'."alert( $search_value );" .'"';
       $js_onclick = 'onClick="'."win_popup('$url', $search_value , '$id',$width,$hight,'yes');" .'"';
       $btn_search->OP_[js_event]->set($js_onclick);
       $my_value .= ' ' . $btn_search->get_tag('Search');
       return $my_value;
   }

    }
?>
