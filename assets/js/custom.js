$(function() {
	var path = window.location.href.split("/").pop();
	$(".nav-item a[href*='" + path +"']").addClass("nactive");
});
// $(document).on("scroll", function(){

// 	if ($(document).scrollTop() > 100){
// 		$(".wercher-navbar").addClass("shrink");
// 	} else {
// 		$(".wercher-navbar").removeClass("shrink");
// 	}

// });