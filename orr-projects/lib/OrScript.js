/*
 *  Suchart Bunhachirat 15/02/2011
 * สุชาติ บุญหชัยรัตน์ 15 กุมภาพันธ์ 2554
 * ไฟล์ java script ทั่วไปที่ใช้ร่วมกันใน orr-projects
 * ข้อมูลจาก
 * http://sixhead.com/2008/01/26/javascript-popup-and-window-opener/
*/
// function นี้มีไว้เพื่อสร้าง popup ให้อยู่กลางจอเสมอ

function popUpWindow(URL, N, W, H, S) { // name, width, height, scrollbars
//var winleft    =    (screen.width - W) / 2;
//var winup    =    (screen.height - H) / 2;
var winleft    =    20;
var winup    =    20;
winProp        =    'width='+W+',height='+H+',left='+winleft+',top=' +winup+',scrollbars='+S+',resizable' + ',status=yes'
Win            =    window.open(URL, N, winProp)
}

// ฟังชั่นสำหรับ เปิดหน้าต่าง popup
function win_popup(theURL,winName,width,height,scollbar) {
var setfocus;
  setfocus = window.open(theURL,winName,'resizable=no,scrollbars='+ scollbar +',width='+ width +',height='+ height +',top=0,left=0');
  setfocus.focus();
}

//ฟังก์ชั่นสำหรับ ปิดหน้าต่าง popup
function win_close() {
	window.close;
}
