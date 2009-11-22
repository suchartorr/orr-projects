<?php
/**
 * Created on Mar 14, 2007 gd2.php
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
$im =  imagecreatetruecolor ( 300, 200); 
$black = imagecolorallocate ($im,  0, 0, 0 ); 
$white = imagecolorallocate ($im,  255, 255, 255 ); 

imagefilledrectangle ($im,0, 0,399,99 ,$white); 
imagerectangle ($im,20, 20,250,190 ,$black); 

header ("Content-type: image/png" ); 
imagepng ($im); 
?>
