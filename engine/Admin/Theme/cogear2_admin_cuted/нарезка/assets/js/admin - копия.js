$(document).ready(function(){

	/* mark sidebar menu items that have submenu*/
	$('.sidebar_menu ul li ul').parent('li').children('a').addClass('submenu');


	/* show arrow for sidebar submenu */
	$('.sidebar_menu ul li ul').hover(
	  function () {
		$(this).parent('li').children('a').addClass('hover');
	  },
	  function () {
		$(this).parent('li').children('a').removeClass('hover');
	  }
	);

	/* sidebar hider */
	$(".sidebar_hider").toggle(
	  function () {
		$('.sidebar_menu').addClass('sidebar_menu_hidden');
		$(".sidebar_hider").addClass('hidden');
		$(".content_column").addClass('wide');
	  },
	  function () {
		$('.sidebar_menu').removeClass('sidebar_menu_hidden');
		$(".sidebar_hider").removeClass('hidden');
		$(".content_column").removeClass('wide');
	  }
	);

});




//Nested Side Bar Menu (Mar 20th, 09)
//By Dynamic Drive: http://www.dynamicdrive.com/style/
var menuids=["sidebar_menu_ul"]

function initsidebarmenu(){
for (var i=0; i<menuids.length; i++){
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
	for (var t=0; t<ultags.length; t++){
	ultags[t].parentNode.getElementsByTagName("a")[0].className+=" subfolderstyle"
  if (ultags[t].parentNode.parentNode.id==menuids[i]) //if this is a first level submenu
   ultags[t].style.left=ultags[t].parentNode.offsetWidth+"px" //dynamically position first level submenus to be width of main menu item
  else //else if this is a sub level submenu (ul)
	ultags[t].style.left=ultags[t-1].getElementsByTagName("a")[0].offsetWidth+"px" //position menu to the right of menu item that activated it
	ultags[t].parentNode.onmouseover=function(){
	this.getElementsByTagName("ul")[0].style.display="block"
	}
	ultags[t].parentNode.onmouseout=function(){
	this.getElementsByTagName("ul")[0].style.display="none"
	}
	}
  for (var t=ultags.length-1; t>-1; t--){ //loop through all sub menus again, and use "display:none" to hide menus (to prevent possible page scrollbars
  ultags[t].style.visibility="visible"
  ultags[t].style.display="none"
  }
  }
}

if (window.addEventListener)
window.addEventListener("load", initsidebarmenu, false)
else if (window.attachEvent)
window.attachEvent("onload", initsidebarmenu)