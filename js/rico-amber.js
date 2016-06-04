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
	var $window = $(window);
	var expSection = 500;
	var expAnim = false;
	var myCircle01, myCircle02, myCircle03;
	var circles = [];
	var circleImg = [];
	var referenceCircle;
	var circlesCreated = false;

	function getWidth() {
		return window.innerWidth / 15;
	}
	$(document).ready(function(){

		//get the parent div of the experience section
		expSection = $('.experience').offset().top;

		$window.resize( function(e) {
			if( !circlesCreated ){
				// CreateCircles();
			}

			for (var i = 0; i < circles.length; i++) {
				circles[i].updateRadius(getWidth());

				circleImg[i].css({
					'width': getWidth().toString(),
					'height': getWidth().toString(),
					'top': ( parseInt(circleImg[ i ].css("width") ) / 2).toString() + "px",
				});
			}
		}); /*window.resize*/


		
		

		$('.header-scroll').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			dotsClass: 'header-dots',
		});

		$('.port-row').slick({
			infinite: true,
  			slidesToShow: 3,
  			slidesToScroll: 1,
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

	function CreateCircles() {
		circlesCreated = true;
		myCircle01 = Circles.create({
			id: 'circles-1',
			radius: 112,
			value: 500,
			maxValue: 500,
			width: 5,
			text: function (value) {
				return value;
			},
			colors: ['#bbb', '#fff'],
			duration: 4000,
			wrpClass: 'circles-wrp',
			textClass: 'experience-count',
			valueStrokeClass: 'circles-valueStroke',
			maxValueStrokeClass: 'circles-maxValueStroke',
			styleWrapper: true,
			styleText: false
		});

		myCircle02 = Circles.create({
			id: 'circles-2',
			radius: 112,
			value: 2500,
			maxValue: 2500,
			width: 5,
			text: function (value) {
				return value;
			},
			colors: ['#bbb', '#fff'],
			duration: 4000,
			wrpClass: 'circles-wrp',
			textClass: 'experience-count',
			valueStrokeClass: 'circles-valueStroke',
			maxValueStrokeClass: 'circles-maxValueStroke',
			styleWrapper: true,
			styleText: false
		});

		myCircle03 = Circles.create({
			id: 'circles-3',
			radius: 112,
			value: 10000,
			maxValue: 10000,
			width: 5,
			text: function (value) {
				return value;
			},
			colors: ['#bbb', '#fff'],
			duration: 4000,
			wrpClass: 'circles-wrp',
			textClass: 'experience-count',
			valueStrokeClass: 'circles-valueStroke',
			maxValueStrokeClass: 'circles-maxValueStroke',
			styleWrapper: true,
			styleText: false
		});

		circles.push(myCircle01);
		circles.push(myCircle02);
		circles.push(myCircle03);

		referenceCircle = $("#circles-1").find( "svg" )[0];
		circleImg.push($(".circleImg-1"));
		circleImg.push($(".circleImg-2"));
		circleImg.push($(".circleImg-3"));
		// console.log(referenceCircle.getAttributeNode('width') );
		for (var i = 0; i < circles.length; i++) {
			console.log('running this');
			circles[i].updateRadius(getWidth());

			circleImg[i].css({
				'width': getWidth().toString(),
				'height': getWidth().toString(),
			});

			circleImg[ i ].css({
				'top': ( parseInt(circleImg[ i ].css("width") ) / 2).toString() + "px"
			});
		}

	} /*CreateCircles*/

	// ==================================================
	// 								WINDOW SCROLL
	// ==================================================

	//we need to check for scrolltop of company expereince
	$window.scroll(function(){
		if( !expAnim ){
			if($window.scrollTop() >= expSection - 200){
				expAnim = true;
				console.log("creating");
				CreateCircles();
			}
		}
	})

 	$(function() {

 		function ShowTeamInfo( event ){
			$( btn ).siblings().css("background-color", "yellow");
		}

		function clickTest(){
			alert("it worked");
		}

		$("#btn").on('click', clickTest );

		$(".team-profile-btn").mouseenter(function() {
			$( this ).siblings(".team-member-picture").find(".member-name-slider")
			.toggle('drop', {direction: 'down'});
			// .toggle('drop');
		});


		$(".team-profile-btn").mouseleave(function() {
			$( this ).siblings(".team-member-picture").find(".member-name-slider")
			.toggle('drop', {direction: 'down'});
		});

		navBarToggle.on('click', function(){
			navMenu.toggle('slide', {direction: 'up', easing: 'linear'}, 1000);
		});


	}); //function
}(jQuery));
