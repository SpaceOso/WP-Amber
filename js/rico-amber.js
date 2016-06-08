(function( $ ) {
	"use strict";

	var navBarToggle;
	var navMenu;
	var $window = $(window);
	var windowWidth;
	var expSection = 500;
	var expAnim = false;
	var myCircle01, myCircle02, myCircle03;
	var circles = [];
	var circleImg = [];
	var circleParents =[];
	var circlesCreated = false;
	var setWidth = false;
	var responsiveSet = false;
	var mobileCircleRadius = 110;
	var maxWindowWidth = 675;
	var hiddenOffset;
	var circleDimensions;
	var expSectionHeight;

	//returns either percentage of screenwidth or mobile width
	function getWidth() {
		if(windowWidth > maxWindowWidth) {
			return window.innerWidth / 15;
		} else{
			return mobileCircleRadius;
		}
	}

	function SetWidthOfCircleImages(){
		if (windowWidth > maxWindowWidth) {
			for (var i = 0; i < circles.length; i++) {
				circles[i].updateRadius(getWidth());
				//NEEDS TO GET LOOKED AT, DON'T THINK IT SHOULD LOOP
				$('#column-' + i ).css({
					'width': 'auto',
					'height': '100%'
				});
				circleImg[i].css({
					'width': getWidth().toString(),
					'height': getWidth().toString(),
					'top': ( parseInt(circleImg[i].css("width")) / 2).toString() + "px",
				});
			}
			setWidth = false;
			//check to see if we're thinner than mobile
		}else if (!setWidth) {
			console.log('testing width');
			setWidth = true;
			for (var i = 0; i < circles.length; i++) {
				circles[i].updateRadius( getWidth() );

				circleImg[i].css({
					'width': getWidth().toString(),
					'height': getWidth().toString(),
					'top': ( getWidth().toString() / 2).toString() + "px",
					// 'left': ( mobileCircleRadius / 2).toString() + "px",
				});
			}
		}
	}

	function SetResponsive(){
		$('.experience').css({
			'height': 'auto'
		});

		responsiveSet = true;
	};

	function SetWidthOfDots(){
		//want to *2 because getWidth() returns a radius
		console.log(window.innerWidth);
		if(window.innerWidth > 820) {
			$('.experience-ellipses-wrapper').css({
				'width': (getWidth() * 2).toString(),
				'height': (getWidth() * 2).toString(),
			});
		}else {
			$('.experience-ellipses-wrapper').css({
				'height': (getWidth() * 2).toString(),
				'width': 'auto'
			});
		}
	}

	function GetParentInfo(){
		//get the experience circle parents
		for(var i = 1; i <= 3; i++){
			var parentContainer = '#column-' + i;
			var circleParent = ".column-content-" + i;
			CreateCircles( circleParent );
			// console.log($(parentContainer).offset().top);
			var startHeight = $(parentContainer).offset().top;
			var columnWidth = $(circleParent).css('width');
			var columnHeight = $(circleParent).css('height');
			circleParents.push( {
				name : parentContainer,
				startHeight : startHeight,
				columnWidth : columnWidth,
				columnHeight : columnHeight,
				created : false
			} );
		}

		for (var i = 0; i <= 2; i++) {
			//once visible set width and height
			$(circleParents[i].name).css({
				'width': circleParents[ i ].columnWidth,
				'height': circleParents[ i ].columnHeight
			});
			//once dimensions have been set hide element
			var contentName = '.column-content-' + (i + 1);
			$(contentName).hide();
		}

		circlesCreated = false;
	}

	function CreateSliders(){
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
	}

	$(document).ready(function(){
		//grab the inner width when site loads
		windowWidth = window.innerWidth;

		//check for window resize
		$window.resize( function(e) {
			windowWidth = window.innerWidth;
			//Check to see if we're wider than the mobile breakpoint
			SetWidthOfCircleImages();
			if(!responsiveSet){
				SetResponsive();
			}
			SetWidthOfDots()
		}); /*window.resize*/

		CreateSliders();

		//grab info for nav bar
		navBarToggle = $('.navbar-toggle');
		navMenu = $('#nav-menu');

		//get the parent div of the experience section
		expSection = $('.experience').offset().top;

		GetParentInfo();

		//================================

		//find first svg and grab it's width and height
		//apply it to the the wrapper class so it's the same dimensions
		//as the circle image
		circleDimensions = $('#circles-1').find('svg');

		$('.experience-ellipses-wrapper').css({
			'width': circleDimensions.attr('width').toString(),
			'height' : circleDimensions.attr('width').toString(),
		});

		//================================

		expSectionHeight = $('.experience').css('height');

		$('.experience').css({'height': expSectionHeight});
	});

	function CreateCircles( circleCount ) {

		console.log("for some fucking reason I'm here");
		// circlesCreated = true;
		if (circleCount == '.column-content-1') {
			console.log("creating column 01");
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
			myCircle01.created = false;
			// if(circles[0] == undefined) {
			// 	circles.push(myCircle01);
			circles[0] = myCircle01;
				// circleImg.push($(".circleImg-1"));
			circleImg[0] = $(".circleImg-1");
			// }
		}

		if (circleCount == '.column-content-2') {
			console.log('creating column 02');
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
			myCircle02.created = false;
			// if(circles[1] == undefined) {
			// 	circles.push(myCircle02);
			circles[1] = myCircle02;
				// circleImg.push($(".circleImg-2"));
			circleImg[1] = $(".circleImg-2");
			// }
		}

		if (circleCount == '.column-content-3') {
			console.log('creating column 03');
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
			myCircle03.created = false;
			// if (circles[2] == undefined) {
			// 	circles.push(myCircle03);
			circles[2] = myCircle03;
				// circleImg.push($(".circleImg-3"));
			circleImg[2] = $(".circleImg-3");
			// }
			circlesCreated = true;
		}

		//set the radius of the image

		//FOR SOME REASON THIS IS RUNNING MORE THAN IT SHOULD
		if (circles.length > 0) {
			console.log(circles);
			for (var i = 0; i < circles.length; i++) {
				//check to see if we already did this
				if (circles[ i ].created == false) {
					console.log('running this');
					circles[i].updateRadius(getWidth());

					circleImg[i].css({
						'width': getWidth().toString(),
						'height': getWidth().toString()
					});

					circleImg[i].css({
						'top': ( parseInt(circleImg[i].css("width")) / 2).toString() + "px"
					});

					circles[ i ].created = true;
				}
			}
		}

	} /*CreateCircles*/

	// ==================================================
	// 		WINDOW SCROLL
	// ==================================================

	function fadeCircles(name){

		console.log("ok 2 seconds later");
		var contentName = '.column-content-' + name;
		$(contentName).toggle('fade', { duration : 1000});
		CreateCircles(contentName);
	}
	//we need to check for scrolltop of company experience
	$window.scroll(function(){
		console.log('circlesCreated: ' + circlesCreated);
		if( !circlesCreated ){
			if ($window.scrollTop() >= expSection - 200) {
				// if (circleParents.length > 0) {
					for (var i = 0; i < circleParents.length; i++) {
						console.log("window: " + $window.scrollTop());
						console.log(circleParents[i].startHeight);
						// if ($window.scrollTop() >= $(circleParents[i]).offset().top - 200) {
						if ($window.scrollTop() >= circleParents[i].startHeight - 20) {
							// console.log("going to create" + circleParents.length);
							// console.log("creating");
							// fuckMeHard();
							if(circleParents[i].created == false) {
								// CreateCircles(circleParents[i].name);
								// $(circleParents[i].name).toggle('fade', { duration : 2000});
								var timeout = [];

								// $( circleParents[ i ].name ).css({
								// 	'width' : circleParents[ i ].columnWidth,
								// 	'height' : circleParents[ i ].columnHeight
								// });

								// window.setTimeout(fadeCircles, 1000 * i + 2, circleParents[i].name);
								window.setTimeout(fadeCircles, 1000 * i + 2, i + 1);
								circleParents[i].created = true;
							}
						}
					}
				// }
			}
		}
	});

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
