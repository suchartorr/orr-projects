<?php
/**
 * Created on Mar 17, 2007 test_graph.php
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * การสร้างกราฟ
 */
include('../jpgraph-2/src/jpgraph.php');
include('../jpgraph-2/src/jpgraph_line.php' );
 require_once('../Or!Lib/Or.php');
 $my = new OrGraph('ตัวอย่างกราฟ','จำนวน','เดือน',600 ,400);
 $data_array[1]  = array(11,3, 8,10,5 ,1,9, 13,5,7 ,20,12); 
 $data_array[2]  = array(8,2, 18,20,9 ,3,5, 21,18,15 ,18,15);
 $data_array[3]  = array(2,12, 8,12,15 ,23,15, 13,28,25 ,30,25);
 $data_array[4]  = array(26,20,12,21,13 ,32,25, 3,20,23 ,10,5);
 $my->set_data_array($data_array);
 /*$my->set_line_plot('a',$ydata,'#008800@0.5');
 $my->set_line_plot('b',$ydata2,'#880088');*/
 $fileName = 'test_graph.png';
 $my->graph->Stroke($fileName);

// Display the graph

?>
