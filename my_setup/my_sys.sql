
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

INSERT INTO `my_sys` (`sys_id`, `any_use`, `aut_user`, `aut_group`, `aut_any`, `aut_god`, `aut_can_from`, `title`, `description`, `sec_user`, `sec_time`, `sec_ip`, `sec_script`) VALUES
('my_can.php', 0, 2, 2, 0, 1, '', 'สิทธิ์การใช้โปรแกรม', '', 'root', now(), '', 'default'),
('my_group.php', 0, 2, 0, 0, 1, '', 'กลุ่มผู้ใช้ระบบ', '', 'root', now(), '', 'default'),
('my_sys.php', 0, 2, 0, 0, 1, '', 'โปรแกรม', '', 'root', now(), '', 'default'),
('my_user.php', 1, 2, 2, 0, 1, '', 'ผู้ใช้ระบบ', '', 'root', now(), '', 'default'),
('my_datafield.php', 0, 2, 1, 0, 1, '', 'เขตข้อมูล', 'กำหนดรายละเอียด ของ Field ข้อมูลที่ใช้งานในระบบ', 'root', now(), '', 'default'),
('my_can_list.php', 0, 0, 0, 0, 1, '', 'รายการผู้มีสิทธิ์ใช้ระบบ', 'แสดงข้อมูลผู้ใช้ระบบ ที่ระบุให้สามารถเข้าใช้โปรแกรมได้', 'root', now(), '', 'default'),
('my_sys_list.php', 1, 0, 0, 0, 1, '', 'รายการโปรแกรม', '', 'root', now(), '', 'default'),
('my_activity_list.php', 0, 0, 0, 0, 0, '', 'รายงานกิจกรรมในระบบ', '<b> รายงานเกี่ยวกับการเกิดกิจกรรมในระบบ</b><br /><ol><li>การเข้าใช้งานระบบ</li><li>การบันทึก แก้ไข ลบ ข้อมูลจากโปรแกรม</li></ol>', 'root', now(), '', 'default'),
('my_sys_popup_list.php', 1, 1, 1, 1, 1, '', 'รายการโปรแกรมที่ลงทะเบียน', 'เพื่อแสดงรายชื่อโปรแกรมที่มีลงทะเบียนสำหรับเลือกใช้งาน', 'root', now(), '', 'default'),
('my_user_popup_list.php', 1, 1, 1, 1, 1, '', 'รายการผู้ใช้ระบบที่ลงทะเบียน', '', 'root', now(), '', 'default'),
('my_user_list.php', 1, 1, 1, 1, 1, '', 'รายการผู้ใช้ระบบที่ลงทะเบียน', '', 'root', now(), '', 'default');
