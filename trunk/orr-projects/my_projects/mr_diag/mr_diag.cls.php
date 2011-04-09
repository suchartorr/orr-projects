<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mr_diag.cls
 *
 * คลาสกลางสำหรับใช้งานในระบบ ICD10
 *
 * @author orr
 */
class patient_info {

    public $hn = null;
    public $full_name = null;
    public $age = null;
    public $sex = null;

    function __construct($hn) {
        global $my_cfg;
        $my_db = new OrMysql($my_cfg[db]); //(กำหนด Object ฐานข้อมูลที่จะใช้)
        $sql = "SELECT * FROM `patient` WHERE `hn` = '" . $hn . "'"; //(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
        //die($sql);
        $my_db->get_query($sql);
        if ($my_db->get_record()) {
            $txt_hn = new OrFormat('hn', '');
            $this->hn = $txt_hn->get_format($my_db->record[hn]);
            $this->full_name = $my_db->record[prefix] . $my_db->record[fname] . $my_db->record[lname];
            if($my_db->record[sex] == 'M')
            {
                $this->sex = 'ชาย';
            }else{
                $this->sex = 'หญิง';
            }

        } else {
            $this->full_name = $hn . ' [ไม่พบข้อมูลตาม HN ]';
        }
        unset($my_db);
    }

}

class label_hn extends OrLabel {

    public $patient_info = null;

    /**
     * Label แสดงชื่อผู้ใช้ระบบ
     * @param string $id Label id
     * @param string $name Label name
     * @param int $idx integer id array
     * @return
     * */
    function OE_before_text($EV_) {
        /* $EV_text : ค่า TEXT */
        extract($EV_, EXTR_OVERWRITE);
        $this->patient_info = new patient_info($EV_text);
        //$this->OP_[text]->set($EV_text . 'ทดสอบ');
        $this->OP_[text]->set($this->patient_info->hn . ' ชื่อ ' . $this->patient_info->full_name . ' เพศ ' . $this->patient_info->sex . ' รอใส่ อายุ วันหลัง' . $this->patient_info->age);
        //eval($this->OE_[before_text]->get());
        return null;
    }

}

?>
