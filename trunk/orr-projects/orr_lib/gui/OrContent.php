<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrContent
 * ส่งค่ากลับ
 * @author orr
 */
class OrContent extends OrObj {

    //put your code here
    function __construct($text='') {
       $this->property('text','string',$text);
    }

    public function show() {
        header('Content-type: text/plain');
        print $this->OP_[text]->get();
    }

}

?>
