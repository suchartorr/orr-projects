<?php
global $my_cfg;
$db = new OrMysql($my_cfg[db]); //(กำหนด Object ฐานข้อมูลที่จะใช้)
$sql = "SELECT `id`  FROM `mr_discharge_summary` WHERE `an` = " . $EV_record[an] ; //(กำหนด SQL ตามเงื่อนไขที่ต้องการ)
$db->get_query($sql);
if ($db->get_record()) {
    $event_link = '<a href="mr_discharge_summary.php?&val_filter[id]=' . $db->record[id] . '&val_compare[id]==&val_msg[btn_filter]=Filter" target="_parent"">' . $EV_record[hn] . '</a>';
} else {
    $event_link = '<a href="mr_discharge_summary.php?discharge_date=' . $EV_record[discharge_date] . '&hn=' . $EV_record[hn]. '&name=' . $EV_record[name]. '&sex=' . $EV_record[sex] . '&an=' . $EV_record[an] . '&evt_form_db[navigator]=New" target="_parent" >' . $EV_record[hn] . '</a>';
}
$this->controls[hn]->OP_[text]->set($event_link);
?>
