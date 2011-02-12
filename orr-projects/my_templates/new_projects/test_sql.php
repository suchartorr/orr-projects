<?php
/**
 * Created on Mar 4, 2007 test_gui.php
 * @version php5
 * @author Suchart Bunhachirat
 * @copyright Copyright &copy; 2007, orr
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require_once('../Or!Lib/Or.php');
 $OrSql = new OrSql();
 $sql = "SELECT `sec_user`, SUM( IF( `sec_script` = 'edit_userinfo.php', 1, 0 ) ) AS `col_1`, SUM( IF( `sec_script` = 'my_can.php', 1, 0 ) ) AS `col_2`, SUM( IF( `sec_script` = 'my_datafield.php', 1, 0 ) ) AS `col_3`, SUM( IF( `sec_script` = 'my_group.php', 1, 0 ) ) AS `col_4`, SUM( IF( `sec_script` = 'my_group_list.php', 1, 0 ) ) AS `col_5`, SUM( IF( `sec_script` = 'my_page.php', 1, 0 ) ) AS `col_6`, SUM( IF( `sec_script` = 'my_sys.php', 1, 0 ) ) AS `col_7`, SUM( IF( `sec_script` = 'my_user.php', 1, 0 ) ) AS `col_8`, SUM( IF( `sec_script` = 'my_user_list.php', 1, 0 ) ) AS `col_9`, SUM( IF( `sec_script` = 'welcome.php', 1, 0 ) ) AS `col_10`, SUM( 1 ) AS `col_0` ";
 $sql .= "FROM `or!config`.`my_activity` ";
 $sql .= "WHERE `sec_user` = 'orr' ";
 $sql .= "GROUP BY `sec_user` ";
 $sql .= "HAVING ( ( SUM( IF( `sec_script` = 'my_can.php', 1, 0 ) ) = 3 ) ) ";
 $sql .= "ORDER BY `col_1` ASC";
 //$sql = 'SELECT `sec_user`, SUM( IF( `sec_script` = \'edit_userinfo.php\', 1, 0 ) ) AS `col_1`, SUM( IF( `sec_script` = \'my_can.php\', 1, 0 ) ) AS `col_2`, SUM( IF( `sec_script` = \'my_datafield.php\', 1, 0 ) ) AS `col_3`, SUM( IF( `sec_script` = \'my_group.php\', 1, 0 ) ) AS `col_4`, SUM( IF( `sec_script` = \'my_group_list.php\', 1, 0 ) ) AS `col_5`, SUM( IF( `sec_script` = \'my_page.php\', 1, 0 ) ) AS `col_6`, SUM( IF( `sec_script` = \'my_sys.php\', 1, 0 ) ) AS `col_7`, SUM( IF( `sec_script` = \'my_user.php\', 1, 0 ) ) AS `col_8`, SUM( IF( `sec_script` = \'my_user_list.php\', 1, 0 ) ) AS `col_9`, SUM( IF( `sec_script` = \'welcome.php\', 1, 0 ) ) AS `col_10`, SUM( 1 ) AS `col_0` FROM `or!config`.`my_activity` WHERE ( ( `sec_user` = \'orr\' ) ) GROUP BY `sec_user` HAVING ( ( SUM( IF( `sec_script` = \'my_can.php\', 1, 0 ) ) = 3 ) ) ORDER BY `col_1` ASC';
 echo $sql . '<br>';
 $OrSql->set_cmd_sql($sql);
 echo $OrSql->get_cmd_sql() . '<br>';
?>
