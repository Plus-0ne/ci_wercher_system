$(function() {
	var path = window.location.href.split("/").pop();
	$(".nav-item a[href*='" + path +"']").addClass("nactive");
});