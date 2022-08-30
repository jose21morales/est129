let menuItem = document.getElementById("menu-item");
let menu2 = document.getElementById("menu2");

menuItem.addEventListener("click", function(){
	menu2.classList.toggle("show-submenu");
});