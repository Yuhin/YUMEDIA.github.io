var $ = jQuery.noConflict();
$(document).ready(function() {
	// Initialize owl carousel
	$(".slides").owlCarousel({
		slideSpeed: 500,
		paginationSpeed: 500,
		singleItem: true,
		paginationNumbers: true,
		autoPlay: 7000,
		stopOnHover: true
	});
});