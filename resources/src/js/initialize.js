addEventListener("load", function() { 
	setTimeout(hideURLbar, 0); 
}, false); 

function hideURLbar() { 
	window.scrollTo(0,1); 
} 

window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')



$(document).ready(function() {
	var navoffeset=$(".header-main").offset().top;
	$(window).scroll(function(){
		var scrollpos=$(window).scrollTop(); 
		if(scrollpos >=navoffeset){
			$(".header-main").addClass("fixed");
		}else{
			$(".header-main").removeClass("fixed");
		}
	});

	var toggle = true;
            
	$(".sidebar-icon").click(function() {                
		if (toggle)
		{
			$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
			$("#menu span").css({"position":"absolute"});
		}
		else
		{
			$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
			setTimeout(function() {
				$("#menu span").css({"position":"relative"});
			}, 400);
		}               
		toggle = !toggle;
	});

	
});