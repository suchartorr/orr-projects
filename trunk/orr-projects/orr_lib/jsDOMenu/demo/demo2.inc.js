function createjsDOMenu() {
  absoluteMenu1 = new jsDOMenu(120, "absolute", "", true);
  with (absoluteMenu1) {
    addMenuItem(new menuItem("Item 1", "", "blank.htm"));
    addMenuItem(new menuItem("Item 2", "item2", "blank.htm"));
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("Item 3", "", "blank.htm"));
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("Item 4", "", "blank.htm"));
    addMenuItem(new menuItem("Item 5", "item5", "blank.htm"));
    moveTo(10, 110);
    show();
  }
  
  absoluteMenu1_1 = new jsDOMenu(130, "absolute");
  with (absoluteMenu1_1) {
    addMenuItem(new menuItem("Item 1", "", "blank.htm"));
    addMenuItem(new menuItem("Item 2", "", "blank.htm"));
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("Item 3", "item3", "blank.htm"));
    addMenuItem(new menuItem("Item 4", "", "blank.htm"));
  }
  
  absoluteMenu1_2 = new jsDOMenu(120, "absolute");
  with (absoluteMenu1_2) {
    addMenuItem(new menuItem("Item 1", "item1", "blank.htm"));
    addMenuItem(new menuItem("Item 2", "", "blank.htm"));
    addMenuItem(new menuItem("Item 3", "item3", "blank.htm"));
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("Item 4", "", "blank.htm"));
  }
  
  absoluteMenu1_1_1 = new jsDOMenu(150, "absolute");
  with (absoluteMenu1_1_1) {
    addMenuItem(new menuItem("Item 1", "", "blank.htm"));
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("Item 2", "", "blank.htm"));
    addMenuItem(new menuItem("Item 3", "", "blank.htm"));
    addMenuItem(new menuItem("Item 4", "", "blank.htm"));
    addMenuItem(new menuItem("Item 5", "", "blank.htm"));
  }
  
  absoluteMenu1_2_1 = new jsDOMenu(140, "absolute");
  with (absoluteMenu1_2_1) {
    addMenuItem(new menuItem("Item 1", "", "blank.htm"));
    addMenuItem(new menuItem("Item 2", "", "blank.htm"));
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("Item 3", "", "blank.htm"));
    addMenuItem(new menuItem("Item 4", "", "blank.htm"));
  }
  
  absoluteMenu1_2_2 = new jsDOMenu(150, "absolute");
  with (absoluteMenu1_2_2) {
    addMenuItem(new menuItem("Item 1", "", "blank.htm"));
    addMenuItem(new menuItem("Item 2", "", "blank.htm"));
    addMenuItem(new menuItem("Item 3", "", "blank.htm"));
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("Item 4", "", "blank.htm"));
    addMenuItem(new menuItem("Item 5", "", "blank.htm"));
  }
  
  absoluteMenu1.items.item2.setSubMenu(absoluteMenu1_1);
  absoluteMenu1.items.item5.setSubMenu(absoluteMenu1_2);
  absoluteMenu1_1.items.item3.setSubMenu(absoluteMenu1_1_1);
  absoluteMenu1_2.items.item1.setSubMenu(absoluteMenu1_2_1);
  absoluteMenu1_2.items.item3.setSubMenu(absoluteMenu1_2_2);
}