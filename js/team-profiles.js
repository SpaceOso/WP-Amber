/**
 * Created by Rico on 6/20/16.
 */
(function($){
	"use strict";

	$(document).ready(function(){
		$(".team-profile-btn").mouseenter(function() {
			$( this ).siblings(".team-member-picture").find(".member-name-slider")
				.toggle('drop', {direction: 'down'});
		});


		$(".team-profile-btn").mouseleave(function() {
			$( this ).siblings(".team-member-picture").find(".member-name-slider")
				.toggle('drop', {direction: 'down'});
		});
	});

})( jQuery );