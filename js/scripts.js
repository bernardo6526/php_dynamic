
$(function () {
	$(".latex").latex();
});

$(document).ready( function() {
	$(".page footer").each(function(index){
	    var total = $('.page footer').length;
	    $(this).find('.this-index').text(index + 1);
	    $(this).find('.total-index').text(total);
	});
});