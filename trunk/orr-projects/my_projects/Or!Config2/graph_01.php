<?php
/**
 * Created on Mar 14, 2007 graph_01.php
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * ทดสอบการสร้างกราฟ
 */
include ( './jpgraph-2/src/jpgraph.php');
include ('./jpgraph-2/src/jpgraph_line.php' );
//DEFINE ("TTF_DIR","/usr/X11R6/lib/X11/fonts/truetype/" ); 
DEFINE ("TTF_DIR2","/usr/share/fonts/truetype/msttcorefonts/" ); 
$font_arial =  TTF_DIR2 . "arial.ttf";
//echo $font_arial;
$font_lucida = "/usr/share/fonts/truetype/java_fonts/LucidaSansRegular.ttf";

$im = imagecreatetruecolor (400,  100); 
$black = imagecolorallocate ($im,  0, 0, 0 ); 
$white = imagecolorallocate ($im,  255, 255, 255 ); 

imagerectangle ($im,0, 0,399,99 ,$black); 
imagefilledrectangle ($im,0, 0,399,99 ,$white); 

imagettftext ($im, 30,  0, 10, 40 , $black, $font_arial ,  "Hello World!"); 
imagettftext ($im, 30,  0, 10, 80 , $black, $font_lucida ,  "สวัสดีจ๊ะ"); 

header ("Content-type: image/png" ); 
imagepng ($im);

?>
