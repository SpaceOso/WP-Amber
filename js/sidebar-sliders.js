/**
 * Created by Rico on 6/17/16.
 */
(function($){
	"use strict";


	$(document).ready(function(){
		$('.rpwe-ul').slick({
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			dots: false,
			prevArrow: $('#port-prev'),
			nextArrow: $('#port-next'),
		});
	});






})( jQuery );
