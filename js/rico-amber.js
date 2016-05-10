(function( $ ) {
	"use strict";
 	$(function() {
		$("#btn").on('click', clickTest );
		$(".team-profile-btn").on('click', clickTest );
		function clickTest(){
			alert("it worked");
		}
	});		
}(jQuery));