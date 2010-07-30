function createjsDOMenu() {
  absoluteMenu1 = new jsDOMenu(200, "absolute");
  with (absoluteMenu1) {
    addMenuItem(new menuItem("โปรแกรม", "my_sys", "my_sys.php"));
    addMenuItem(new menuItem("ผู้ใช้ระบบ", "my_user", "my_user.php"));
    addMenuItem(new menuItem("กลุ่มผู้ใช้ระบบ", "my_group", "my_group.php"));
    addMenuItem(new menuItem("สิทธิ์การใช้โปรแกรม", "my_can", "my_can.php"));
    addMenuItem(new menuItem("เขตข้อมูล", "my_datafield", "my_datafield.php"));
  }
  absoluteMenu1.items.my_sys.showIcon("icon_my_sys", "", "");
  absoluteMenu1.items.my_user.showIcon("icon_my_user", "", "");
  absoluteMenu1.items.my_group.showIcon("icon_my_group", "", "");
  absoluteMenu1.items.my_can.showIcon("icon_my_can", "", "");
  absoluteMenu1.items.my_datafield.showIcon("icon_my_datafield", "", "");
  
  absoluteMenu2 = new jsDOMenu(200, "absolute");
  with (absoluteMenu2) {
    addMenuItem(new menuItem("โปรแกรมในระบบ", "", "my_sys_list.php"));
    addMenuItem(new menuItem("ผู้ใช้งานในระบบ", "", "my_user_list.php"));
    addMenuItem(new menuItem("กลุ่มผู้ใช้งานระบบ", "", "my_group_list.php"));
    addMenuItem(new menuItem("สิทธิ์การใช้งานระบบ", "", "my_can_list.php"));
    addMenuItem(new menuItem("กิจกรรมในระบบ", "", "my_activity_list.php"));
  }
  
  absoluteMenu0 = new jsDOMenu(200, "absolute");
  with (absoluteMenu0) {
    addMenuItem(new menuItem("บันทึกผู้ใช้งาน", "login", "welcome.php"));
    addMenuItem(new menuItem("แก้ไขข้อมูลผู้ใช้งาน", "", "edit_userinfo.php"));
  }
  absoluteMenu0.items.login.showIcon("icon_login", "", "");
  
  absoluteMenuBar = new jsDOMenuBar("static", "staticMenuBar");
  with (absoluteMenuBar) {
    addMenuBarItem(new menuBarItem("แฟ้ม", absoluteMenu1 , "item1"));
    addMenuBarItem(new menuBarItem("รายการ", absoluteMenu2 , "item1"));
    addMenuBarItem(new menuBarItem("ระบบ", absoluteMenu0 , "item0"));
  }
}
