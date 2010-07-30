function getMainMenuBarMenuLeftPos(menuBarObj,menuBarItemObj,menuObj,x){if(x+menuObj.offsetWidth<=getClientWidth()){return x;}else{return x+menuBarItemObj.offsetWidth-menuObj.offsetWidth+getPropIntVal(menuObj,blw)+getPropIntVal(menuObj,brw);}}function getMainMenuBarMenuTopPos(menuBarObj,menuBarItemObj,menuObj,y){if(y+menuObj.offsetHeight<=getClientHeight()){return y;}else{if((ie55||ie6)&&menuBarObj.mode=="static"&&pageMode==0){y=menuBarObj.offsetTop+menuBarObj.offsetHeight-getScrollTop();}if((ie55||ie6)&&menuBarObj.mode=="static"&&pageMode==1){return menuBarItemObj.offsetTop-menuObj.offsetHeight-getPropIntVal(menuBarObj,pt)+getPropIntVal(menuBarItemObj,pt)+getPropIntVal(menuBarItemObj,btw)-getScrollTop();}else{return y-menuObj.offsetHeight-menuBarObj.offsetHeight;}}}function popUpMenuBarMenu(menuBarObj,menuBarItemObj,menuObj){var x;var y;if(menuBarObj.style.position=="fixed"){x=menuBarObj.offsetLeft+menuBarItemObj.offsetLeft+getPropIntVal(menuBarObj,blw)-getPropIntVal(menuObj,blw);y=menuBarObj.offsetTop+menuBarObj.offsetHeight;if(opera||safari){x-=getPropIntVal(menuBarObj,blw);}menuObj.style.position="absolute";menuObj.style.left=getMainMenuBarMenuLeftPos(menuBarObj,menuBarItemObj,menuObj,x)+px;menuObj.style.top=getMainMenuBarMenuTopPos(menuBarObj,menuBarItemObj,menuObj,y)+px;menuObj.style.position="fixed";}else{if(menuBarObj.mode=="static"){x=menuBarItemObj.offsetLeft-getPropIntVal(menuObj,blw)-getScrollLeft();y=menuBarObj.offsetTop+menuBarObj.offsetHeight-getScrollTop();if(ie55||ie6){x+=getPropIntVal(menuBarObj,blw);y=menuBarItemObj.offsetTop+menuBarItemObj.offsetHeight+getPropIntVal(menuBarObj,bbw)+getPropIntVal(menuBarObj,pb)-getPropIntVal(menuBarItemObj,bbw)-getScrollTop();}if(safari){x+=8;y+=13;}menuObj.style.left=(getMainMenuBarMenuLeftPos(menuBarObj,menuBarItemObj,menuObj,x)+getScrollLeft())+px;menuObj.style.top=(getMainMenuBarMenuTopPos(menuBarObj,menuBarItemObj,menuObj,y)+getScrollTop())+px;}else{x=menuBarObj.offsetLeft+menuBarItemObj.offsetLeft+getPropIntVal(menuBarObj,blw)-getPropIntVal(menuObj,blw)-getScrollLeft();y=menuBarObj.offsetTop+menuBarObj.offsetHeight-getScrollTop();if(opera||safari){x-=getPropIntVal(menuBarObj,blw);}menuObj.style.left=(getMainMenuBarMenuLeftPos(menuBarObj,menuBarItemObj,menuObj,x)+getScrollLeft())+px;menuObj.style.top=(getMainMenuBarMenuTopPos(menuBarObj,menuBarItemObj,menuObj,y)+getScrollTop())+px;}}if(ie&&menuObj.mode=="fixed"){menuObj.initialLeft=parseInt(menuObj.style.left)-getScrollLeft();menuObj.initialTop=parseInt(menuObj.style.top)-getScrollTop();}menuObj.style.visibility="visible";}function refreshMenuBarItems(menuBarObj){for(var i=0,len=menuBarObj.childNodes.length;i<len;i++){if(menuBarObj.childNodes[i].enabled&&menuBarObj.childNodes[i].clicked){menuBarObj.childNodes[i].className=menuBarObj.childNodes[i].itemClassName;if(menuBarObj.childNodes[i].iconObj){menuBarObj.childNodes[i].iconObj.className=menuBarObj.childNodes[i].iconClassName;}menuBarObj.childNodes[i].clicked=false;if(menuBarObj.childNodes[i].menu){hideMenus(menuBarObj.childNodes[i].menu.menuObj);}break;}}menuBarObj.activated=false;}function menuBarItemOver(e){if(this.parent.menuBarObj.activated){if(!this.clicked){var menuBarObj=this.parent.menuBarObj;for(var i=0,len=menuBarObj.childNodes.length;i<len;i++){if(menuBarObj.childNodes[i].enabled&&menuBarObj.childNodes[i].clicked){menuBarObj.childNodes[i].className=menuBarObj.childNodes[i].itemClassName;if(menuBarObj.childNodes[i].iconObj){menuBarObj.childNodes[i].iconObj.className=menuBarObj.childNodes[i].iconClassName;}menuBarObj.childNodes[i].clicked=false;if(menuBarObj.childNodes[i].menu){hideMenus(menuBarObj.childNodes[i].menu.menuObj);}break;}}if(this.enabled){if(this.menu){this.onclick(e);}else{if(this.actionOnClick){this.className=this.itemClassNameClick;if(this.iconObj&&this.iconClassNameClick){this.iconObj.className=this.iconClassNameClick;}this.clicked=true;}}}}}else{var menuBarObj=this.parent.menuBarObj;for(var i=0,len=menuBarObj.childNodes.length;i<len;i++){if(menuBarObj.childNodes[i].enabled){menuBarObj.childNodes[i].className=menuBarObj.childNodes[i].itemClassName;if(menuBarObj.childNodes[i].iconObj){menuBarObj.childNodes[i].iconObj.className=menuBarObj.childNodes[i].iconClassName;}}}if(this.enabled&&(this.menu||this.actionOnClick)){switch(menuBarObj.activateMode){case "click":this.className=this.itemClassNameOver;break;case "over":if(this.menu){this.onclick(e);}else{this.className=this.itemClassNameOver;}break;}if(this.iconObj&&this.iconClassNameOver){this.iconObj.className=this.iconClassNameOver;}}}}function menuBarItemClick(e){if(this.enabled){if(this.menu){if(this.clicked){this.className=this.itemClassNameOver;if(this.iconObj){this.iconObj.className=this.iconClassNameOver;}hideMenus(this.menu.menuObj);this.clicked=false;this.parent.menuBarObj.activated=false;}else{this.className=this.itemClassNameClick;if(this.iconObj&&this.iconClassNameClick){this.iconObj.className=this.iconClassNameClick;}popUpMenuBarMenu(this.parent.menuBarObj,this,this.menu.menuObj);this.clicked=true;this.parent.menuBarObj.activated=true;}}else{if(this.actionOnClick){var action=this.actionOnClick;if(action.indexOf("link:")==0){location.href=action.substr(5);}else{if(action.indexOf("code:")==0){eval(action.substr(5));}else{location.href=action;}}this.className=this.itemClassName;if(this.iconObj){this.iconObj.className=this.iconClassName;}this.clicked=false;this.parent.menuBarObj.activated=false;}}}if(!e){var e=window.event;e.cancelBubble=true;}if(e.stopPropagation){e.stopPropagation();}}function menuBarItemOut(){if(!this.parent.menuBarObj.activated){this.className=this.itemClassName;if(this.iconObj){this.iconObj.className=this.iconClassName;}}}function menuBarDown(e){draggingObj=this.parent.menuBarObj;var menuBarObj=this.parent.menuBarObj;menuBarObj.differenceLeft=getX(e)-menuBarObj.offsetLeft;menuBarObj.differenceTop=getY(e)-menuBarObj.offsetTop;hideMenuBarMenus();document.onmousemove=mouseMoveHandler;}function menuBarUp(){draggingObj=null;var menuBarObj=this.parent.menuBarObj;menuBarObj.differenceLeft=0;menuBarObj.differenceTop=0;menuBarObj.initialLeft=menuBarObj.offsetLeft-getScrollLeft();menuBarObj.initialTop=menuBarObj.offsetTop-getScrollTop();document.onmousemove=null;}function mouseMoveHandler(e){if(draggingObj){draggingObj.style.left=(getX(e)-draggingObj.differenceLeft)+px;draggingObj.style.top=(getY(e)-draggingObj.differenceTop)+px;}}function menuBarScrollHandler(){for(var i=1;i<=menuBarCount;i++){var menuBarObj=getElmId("DOMenuBar"+i);if(ie&&menuBarObj.mode=="fixed"){menuBarObj.style.left=(menuBarObj.initialLeft+getScrollLeft())+px;menuBarObj.style.top=(menuBarObj.initialTop+getScrollTop())+px;}}}function hideMenuBarMenus(){for(var i=1;i<=menuBarCount;i++){refreshMenuBarItems(getElmId("DOMenuBar"+i));}}function showMenuBarItemIcon(){var iconElm=createElm("span");var textNode=document.createTextNode("");iconElm.appendChild(textNode);iconElm.id=this.id+"Icon";iconElm.className=arguments[0];this.insertBefore(iconElm,this.firstChild);var height;var offsetHeight;var menuBarObj=this.parent.menuBarObj;var offset=getPropIntVal(menuBarObj,btw)+getPropIntVal(this,pt)-getPropIntVal(menuBarObj,pb)-getPropIntVal(menuBarObj,bbw)-getPropIntVal(this,pb);if(ie55||ie6){height=getPropIntVal(iconElm,"height");offsetHeight=(menuBarObj.mode=="static")?menuBarObj.offsetHeight+offset:this.offsetHeight+getPropIntVal(this,pt)-getPropIntVal(this,pb);}else{height=iconElm.offsetHeight;offsetHeight=this.offsetHeight;}iconElm.style.top=Math.floor((offsetHeight-height)/2)+px;if(opera&&this.parent.menuBarObj.mode!="static"){iconElm.style.display="none";}this.iconClassName=iconElm.className;var len=arguments.length;if(len>1&&arguments[1].length>0){this.iconClassNameOver=arguments[1];}if(len>2&&arguments[2].length>0){this.iconClassNameClick=arguments[2];}this.iconObj=iconElm;this.setIconClassName=function(className){if(opera&&this.parent.menuBarObj.mode!="static"){return;}this.iconClassName=className;this.iconObj.className=this.iconClassName;};this.setIconClassNameOver=function(classNameOver){if(opera&&this.parent.menuBarObj.mode!="static"){return;}this.iconClassNameOver=classNameOver;};this.setIconClassNameClick=function(classNameClick){if(opera&&this.parent.menuBarObj.mode!="static"){return;}this.iconClassNameClick=classNameClick;};}function addMenuBarItem(menuBarItemObj){var itemElm=createElm("span");itemElm.id=menuBarItemObj.id;itemElm.menu=menuBarItemObj.menu;itemElm.enabled=menuBarItemObj.enabled;itemElm.clicked=false;itemElm.actionOnClick=menuBarItemObj.actionOnClick;itemElm.itemClassName=menuBarItemObj.className;itemElm.itemClassNameOver=menuBarItemObj.classNameOver;itemElm.itemClassNameClick=menuBarItemObj.classNameClick;itemElm.className=itemElm.itemClassName;if(ie50){itemElm.style.height="1%";}if(ie55){itemElm.style.width="auto";}var textNode=document.createTextNode(menuBarItemObj.displayText);itemElm.appendChild(textNode);this.menuBarObj.appendChild(itemElm);itemElm.parent=this;itemElm.setClassName=function(className){this.itemClassName=className;this.className=this.itemClassName;};itemElm.setClassNameOver=function(classNameOver){this.itemClassNameOver=classNameOver;};itemElm.setClassNameClick=function(classNameClick){this.itemClassNameClick=classNameClick;};itemElm.setDisplayText=function(text){if(this.childNodes[0].nodeType==3){this.childNodes[0].nodeValue=text;}else{this.childNodes[1].nodeValue=text;}};itemElm.setMenu=function(menu){this.menu=menu;};itemElm.showIcon=showMenuBarItemIcon;itemElm.onmouseover=menuBarItemOver;itemElm.onclick=menuBarItemClick;itemElm.onmouseout=menuBarItemOut;if(menuBarItemObj.itemName.length>0){this.items[menuBarItemObj.itemName]=itemElm;}else{this.items[this.items.length]=itemElm;}var len=0;for(var x in this.items){++len;}if(len==1&&opera&&pageMode==0){this.dragObj.style.height=(this.dragObj.offsetTop-itemElm.offsetTop)+px;}}function menuBarItem(){this.displayText=arguments[0];this.id="menuBarItem"+(++menuBarItemCount);this.itemName="";this.menu=null;this.enabled=true;this.actionOnClick="";this.className=menuBarItemClassName;this.classNameOver=menuBarItemClassNameOver;this.classNameClick=menuBarItemClassNameClick;var len=arguments.length;if(len>1&&typeof(arguments[1])=="object"){this.menu=arguments[1];}if(len>2&&arguments[2].length>0){this.itemName=arguments[2];}if(len>3&&typeof(arguments[3])=="boolean"){this.enabled=arguments[3];}if(len>4&&arguments[4].length>0){this.actionOnClick=arguments[4];}if(len>5&&arguments[5].length>0){this.className=arguments[5];}if(len>6&&arguments[6].length>0){this.classNameOver=arguments[6];}if(len>7&&arguments[7].length>0){this.classNameClick=arguments[7];}}function jsDOMenuBar(){this.items=new Array();var dragElm=createElm("span");dragElm.className=menuBarDragClassName;var textNode=document.createTextNode("");dragElm.appendChild(textNode);var menuBarElm;var len=arguments.length;if(len>1&&arguments[1].length>0&&arguments[0]=="static"){menuBarElm=getElmId(arguments[1]);if(!menuBarElm){return;}staticMenuBarId[staticMenuBarId.length]=arguments[1];menuBarElm.appendChild(dragElm);}else{menuBarElm=createElm("div");menuBarElm.appendChild(dragElm);menuBarElm.id="DOMenuBar"+(++menuBarCount);}menuBarElm.mode=menuBarMode;menuBarElm.activateMode=menuBarActivateMode;menuBarElm.draggable=false;menuBarElm.className=menuBarClassName;menuBarElm.activated=false;menuBarElm.initialLeft=0;menuBarElm.initialTop=0;menuBarElm.differenceLeft=0;menuBarElm.differenceTop=0;if(len>0&&arguments[0].length>0){switch(arguments[0]){case "absolute":menuBarElm.style.position="absolute";menuBarElm.mode="absolute";break;case "fixed":if(ie){menuBarElm.style.position="absolute";}else{menuBarElm.style.position="fixed";}menuBarElm.mode="fixed";break;case "static":menuBarElm.style.position="static";menuBarElm.mode="static";break;}}if(len>2&&typeof(arguments[2])=="boolean"){menuBarElm.draggable=arguments[2];if(menuBarElm.draggable){dragElm.style.visibility="visible";}else{dragElm.style.visibility="hidden";}}if(len>3&&arguments[3].length>0){menuBarElm.className=arguments[3];}if(len>4&&typeof(arguments[4])=="number"&&arguments[4]>0){menuBarElm.style.width=arguments[4]+px;}if(len>5&&typeof(arguments[5])=="number"&&arguments[5]>0){menuBarElm.style.height=arguments[5]+px;}menuBarElm.style.left="0px";menuBarElm.style.top="0px";if(ie50){menuBarElm.style.height="1%";}if(menuBarElm.mode!="static"){document.body.appendChild(menuBarElm);}else{if(ie){menuBarElm.style.height="1%";}}if(!getPropVal(menuBarElm,blw)){menuBarElm.style.borderWidth=menuBarBorderWidth+px;}this.menuBarObj=menuBarElm;this.dragObj=dragElm;dragElm.parent=this;this.addMenuBarItem=addMenuBarItem;this.menuBarObj.onclick=function(e){if(!e){var e=window.event;e.cancelBubble=true;}if(e.stopPropagation){e.stopPropagation();}};dragElm.onmousedown=menuBarDown;dragElm.onmouseup=menuBarUp;this.setMode=function(mode){switch(mode){case "absolute":this.menuBarObj.style.position="absolute";this.menuBarObj.mode="absolute";this.menuBarObj.initialLeft=parseInt(this.menuBarObj.style.left);this.menuBarObj.initialTop=parseInt(this.menuBarObj.style.top);break;case "fixed":if(ie){this.menuBarObj.style.position="absolute";this.menuBarObj.initialLeft=parseInt(this.menuBarObj.style.left);this.menuBarObj.initialTop=parseInt(this.menuBarObj.style.top);}else{this.menuBarObj.style.position="fixed";}this.menuBarObj.mode="fixed";break;}};this.setActivateMode=function(activateMode){this.menuBarObj.activateMode=activateMode;};this.setDraggable=function(draggable){if(typeof(draggable)=="boolean"&&this.menuBarObj.mode!="static"){this.menuBarObj.draggable=draggable;if(this.menuBarObj.draggable){this.dragObj.style.visibility="visible";}else{this.dragObj.style.visibility="hidden";}}};this.setClassName=function(className){this.menuBarObj.className=className;};this.setDragClassName=function(className){this.dragObj.className=className;};this.show=function(){this.menuBarObj.style.visibility="visible";};this.hide=function(){this.menuBarObj.style.visibility="hidden";};this.setX=function(x){this.menuBarObj.initialLeft=x;this.menuBarObj.style.left=x+px;};this.setY=function(y){this.menuBarObj.initialTop=y;this.menuBarObj.style.top=y+px;};this.moveTo=function(x,y){this.menuBarObj.initialLeft=x;this.menuBarObj.initialTop=y;this.menuBarObj.style.left=x+px;this.menuBarObj.style.top=y+px;};this.moveBy=function(x,y){var left=parseInt(this.menuBarObj.style.left);var top=parseInt(this.menuBarObj.style.top);this.menuBarObj.initialLeft=left+x;this.menuBarObj.initialTop=top+y;this.menuBarObj.style.left=(left+x)+px;this.menuBarObj.style.top=(top+y)+px;};this.setBorderWidth=function(width){this.menuBarObj.style.borderWidth=width+px;};}if(typeof(menuBarClassName)=="undefined"){var menuBarClassName="jsdomenubardiv";}if(typeof(menuBarItemClassName)=="undefined"){var menuBarItemClassName="jsdomenubaritem";}if(typeof(menuBarItemClassNameOver)=="undefined"){var menuBarItemClassNameOver="jsdomenubaritemover";}if(typeof(menuBarItemClassNameClick)=="undefined"){var menuBarItemClassNameClick="jsdomenubaritemclick";}if(typeof(menuBarDragClassName)=="undefined"){var menuBarDragClassName="jsdomenubardragdiv";}if(typeof(menuBarMode)=="undefined"){var menuBarMode="absolute";}if(typeof(menuBarActivateMode)=="undefined"){var menuBarActivateMode="click";}if(typeof(menuBarBorderWidth)=="undefined"){var menuBarBorderWidth=2;}var pt="padding-top";var pb="padding-bottom";var menuBarCount=0;var menuBarItemCount=0;var draggingObj=null;var staticMenuBarId=new Array();