const toggler = document.querySelector(".btn");
toggler.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

if (screen.width > 1200) {
	/*document.querySelector("#sidebar").classList.toggle("collapsed");*/
	document.getElementById("sidebar").classList.remove('collapsed');
}