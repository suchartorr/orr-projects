<?php

/**
 * my_page.cls.php
 *
 * PHP versions 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @package    Or!Lib
 * @author     Suchart Bunhachirat <suchart.orr@gmail.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    2554
 */

/**
 * Class สำหรับสร้างหน้าจอกราฟ
 * @package    Or!Lib
 * @author     Suchart Bunhachirat <suchart.orr@gmail.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    2554
 */
class OrDojoChart extends OrHtml {

    private $dojo_require_script = array();
    private $chart_series = array();

    /**
     * กำหนดค่าที่ต้องการ
     * @param string $title ชื่อไตเติลของกราฟ
     *
     */
    function __construct($title = '') {
        parent::__construct($title);
        $this->set_skin('../../orr_lib/dojo/default_chart.html'); //รูปแบบหน้าแสดงกราฟ
        $this->dojo_require();//กำหนดคำสั่ง require
    }

    /**
     * set_dojo_require : กำหนดคำสั่ง dojo.require
     * @param tag ประโยคคำสั่ง
     * @return null
     */
    function set_dojo_require($tag) {
        $tag = $tag;
        if (!is_array($tag)) {
            $tag = array($tag);
        }
        $this->dojo_require_script = array_merge($this->dojo_require_script, $tag);
        return null;
    }

    /**
     * set_dojo_require : กำหนดคำสั่ง dojo.require
     * @param null
     * @return null
     */
    function dojo_require() {
        $this->set_dojo_require('dojo.require("dojox.charting.Chart2D");');
        $this->set_dojo_require('dojo.require("dojox.charting.widget.Legend");');
        $this->set_dojo_require('dojo.require("dojox.charting.action2d.Tooltip");');
        $this->set_dojo_require('dojo.require("dojox.charting.action2d.Magnify");');
        $this->set_dojo_require('dojo.require("dojox.charting.themes.Claro");');
        return null;
    }

    function get_dojo_require() {
        foreach ($this->dojo_require_script as $line) {
            $my_value .= $line;
        }
        return $my_value;
    }

    /**
     * set_chart_series : กำหนดข้อมูลในกราฟ
     * @param $name ชื่อของเส้นกราฟ ตัวอย่างเช่น ยอดขายเดือน ม.ค. 54
     * @param $data ข้อมูลของกราฟ ตัวอย่างเช่น [1000,2000,3000,4000]
     * @return null
     */
    function set_chart_series($name,$data) {
        $my_tag = 'chart.addSeries("' . $name . '",' . $data . ');';
        $my_tag = array($my_tag);
        $this->chart_series = array_merge($this->chart_series, $my_tag);
        return null;
    }

    function get_chart_series() {
        foreach ($this->chart_series as $line) {
            $my_value .= $line;
        }
        return $my_value;
    }

    /**
     * show : แสดงหน้ากราฟ
     * @param null
     * @return null
     */
    function show() {
        $this->skin->set_skin_tag('dojo_require', $this->get_dojo_require());
        $this->skin->set_skin_tag('chart_series', $this->get_chart_series());
        parent::show();
    }

}

?>
