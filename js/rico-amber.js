(function( $ ) {
	"use strict";

	var portViewerWidth;
	var portColumnWidth;  
	var portColumns = [];
	var numberOfPosts = 3;		//how many posts we want to display
	var postWidth = 0;
	var postViewer;
	var postViewerWidth = 0;
	var portPrev, portNext, portPostRow, portPostRowPositoin;
	var navBarToggle;
	var navMenu;
	var expYear;
	var $window = $(window);
	var expSection;
	var expAnim = false;

	$(document).ready(function(){

		expSection = $('.experience').offset().top;

		$('.port-row').slick({
			infinite: true,
  		slidesToShow: 3,
  		slidesToScroll: 1,
			//centerMode: true,
			// variableWidth: true,
			prevArrow: $('#port-prev'),
			nextArrow: $('#port-next'),
			responsive: [
				{
					breakpoint: 1128,
					settings:{
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: true
					}
				}, //1128
				{
					breakpoint: 700,
					settings:{
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: true
					}
				}, //700
				{
					breakpoint: 535,
					settings:{
						slidesToShow: 1,
						slidesToScroll: 1,
						infinite: true
					}
				}, //535
				{
					breakpoint: 426,
					settings:{
						slidesToShow: 1,
						slidesToScroll: 1,
						// centerMode: true,
						// variableWidth: true,
						infinite: true
					}
				}
			]
		});

		$('.quote-text').slick({
			infinite: true,
			dots: true,
			arrows: false,
			draggable: false,
			slidesToShow: 1,
			slidesToScroll: 1
		});
		//grab info for nav bar
		navBarToggle = $('.navbar-toggle');
		navMenu = $('#nav-menu');

	});

	function StartExpAnim(){
		var animOptions = {
			useEasing: false
		}
		var expFirstAnim = new CountUp('exp-first', 0, 500, 0, 4, animOptions);
		var expSecondAnim = new CountUp('exp-second', 0, 2500, 0, 4);
		var expThirdAnim = new CountUp('exp-third', 0, 10000, 0, 4);
		expFirstAnim.start();
		expSecondAnim.start();
		expThirdAnim.start();
	}
	// ==================================================
	// 								WINDOW SCROLL
	// ==================================================

	//we need to check for scrolltop of company expereince
	$window.scroll(function(){
		if( !expAnim ){
			if($window.scrollTop() >= expSection){
				expAnim = true;
				StartExpAnim();
			}
		}
	})

	function SlidePostRow(event){
		//We'er probably going to want to move each post individually
		//so we can tell when a post is outside of the viewer
		//if we move the whole container when we move posts around it oculd collapse
		//...actually that might work, if there's lag there might be snapping happening
		//if post 1 is outside the width of container, make it post last
		//post 2 now becomes post 1, check again
		//do the same for last post. If past last is outside container width make it post 1
		// post 2 stays the same, post 1 becomes last post. This is so they will loop
		//probably want to disable the function while looping animation happens so it doesn't queue a bunch of hits


		if(event.data.btn == 'prev'){
			//if we hit the previous button we want to move positive
			portPostRow.animate({
			left: portPostRowPositoin.left + postWidth},
			1000, function() {
				/* stuff to do after animation is complete */
				portPostRowPositoin = portPostRow.position();
				console.log(portPostRowPositoin.left);
			});
		}else if(event.data.btn == 'next'){
			//if we hit the next button we want to move negative
			portPostRow.animate({
			left: portPostRowPositoin.left - postWidth},
			1000, function() {
				/* stuff to do after animation is complete */
				portPostRowPositoin = portPostRow.position();
				console.log(portPostRowPositoin.left);
			});
		}

		console.log( $(portColumns[0]).is(':visible') );
	}


 	$(function() {

 		function ShowTeamInfo( event ){
			$( btn ).siblings().css("background-color", "yellow");
		}

		function clickTest(){
			alert("it worked");
		}

		$("#btn").on('click', clickTest );

		$(".team-profile-btn").mouseenter(function() {
			$( this ).closest(".team-member-info").find(".team-member-name")
			.toggle('drop', {direction: 'down'});
		});


		$(".team-profile-btn").mouseleave(function() {
			$( this ).closest(".team-member-info").find(".team-member-name")
			.toggle('drop', {direction: 'down'});
		});

		navBarToggle.on('click', function(){
			navMenu.toggle('slide', {direction: 'up', easing: 'linear'}, 1000);
		});


	}); //function
}(jQuery));
