<?php
//
//@version php5
//@author Suchart Bunhachirat
//@copyright Copyright &copy; 2007, orr
//Class ...
//*****************************************************************
class OrExt extends OrGui {
  //
  //__construct : วิธีการทำงานเริ่มต้นของคลาส
  //@param string
  //@return null
  
  function __construct()
  {
                /*
                *การกำหนดคุณสมบัติ ของคลาส ใช้คำสั่ง
                * $this->property('ชื่อ' , 'ประเภทข้อมูล' ,'ค่าเริ่มต้น');
                */
            // $this->property('ajax_src','string','./dojo-0.4.1-ajax/dojo.js');
                /*
                *การกำหนดเหตุการณ์ ของคลาส ใช้คำสั่ง
                * $this->event('ชื่อเหตุการณ์');
                */
            //$this->event('on_load');
  }

  //
  //import : กำหนด Ext package ที่เรียกใช้
  //@param string $script ที่อยู่และชื่อไฟล์ที่เรียกใช้งาน
  //@return null
  
  function set_onReady($script)
  {
            echo 'Ext.onReady(function(){';

  }

  function get_onReady()
  {
             
  }

}


?>
