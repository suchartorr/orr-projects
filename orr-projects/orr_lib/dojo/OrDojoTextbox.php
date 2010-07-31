<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrDojoTextbox
 *
 * @author orr
 */
class OrDojoTextbox extends OrTextbox{
    function  __construct($id, $name = null, $idx = null) {
        parent::__construct($id, $name, $idx);
    }

    function get_tag($value = null) {
        if ($value != null) {
            $this->OP_[value]->set($value);
        } else if (is_numeric($value)) {
            $this->OP_[value]->set($value);
        }

        if ($this->OP_[auto_post]->get()) {
            $this->auto_post();
        }

        $id = $this->get_id_tag();
        $value = $this->OP_[value]->get();
        $maxlength = $this->OP_[maxlength]->get();
        $size = $this->OP_[size]->get();
        $type = 'type="' . $this->OP_[type]->get() . '"';

        if ($this->OP_[password]->get()
            )$type = 'type="password"';
        if ($value == null AND !is_numeric($value)) {
            $value = $this->OP_[post_value]->get();
        }

        if ($value == null AND !is_numeric($value)) {
            $value = $this->OP_[default_value]->get();
        }

        if ($maxlength == 0) {
            $maxlength = null;
        } else {
            $maxlength = 'maxlength="' . $maxlength . '"';
        }

        if ($size == 0) {
            $size = null;
        } else {
            //$size = 'size="'.$size.'"';
            $size = $size * 7;
            $size = 'style="width: ' . $size . 'px;"';
        }

        if ($this->OP_[class_name]->get() == null) {
            $class = null;
        } else {
            $class = 'class="' . $this->OP_[class_name]->get() . '"';
        }
        $this->clip_value($value);
        $value = 'value="' . $value . '"';
        $title = 'title="' . $this->OP_[title]->get() . '"';
        $dojo_type = 'dojoType="dijit.form.ValidationTextBox" regExp="[^\s]+" required="true" invalidMessage="Invalid Non-Space Text."';
        $my_value = "<input $id $class  $type $dojo_type $maxlength $size $value $title>" . $this->get_properties_tag();
        return $my_value;
    }
}
?>
