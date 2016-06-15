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
	var mobile = false;
	var hiddenOffset;
	var expSectionHeight;

	//returns either percentage of screenwidth or mobile width
	function getWidth() {
		if(windowWidth >= maxWindowWidth) {
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
				$('#column-' + (i + 1) ).css({
					'width': 'auto',
					'height': '100%'
				});
				circleImg[i].css({
					'width': getWidth().toString(),
					'height': getWidth().toString(),

				});
				circleImg[i].css({
					'top': ( parseInt(circleImg[i].css("width")) / 2).toString() + "px"
				})
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
				});
			}
		}
	}

	function SetResponsive(){
		$('.experience').css({
			'height': 'auto'
		});

		responsiveSet = true;
	}

	function SetWidthOfDots(){
		/*find first svg and grab it's width and height
		apply it to the the wrapper class so it's the same dimensions
		as the circle image*/
		var circleDimensions = $('#circles-1').find('svg');

		$('.experience-ellipses-wrapper').css({
			'width': circleDimensions.attr('width').toString(),
			'height' : circleDimensions.attr('width').toString(),
		});
	}

	function ResizeWidthOfDots(){
		//want to *2 because getWidth() returns a radius
		// console.log(window.innerWidth);
		if(window.innerWidth > 820) {
			$('.experience-ellipses-wrapper').css({
				'width': (getWidth() * 2).toString(),
				'height': (getWidth() * 2).toString(),
			});
		}else {
			$('.experience-ellipses-wrapper').css({
				'height': (getWidth() * 2).toString(),
				'width': (getWidth() / 2).toString(),
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
			var startHeight = $(circleParent).offset().top;
			var columnWidth = $(circleParent).css('width');
			var columnHeight = $(circleParent).css('height');
			circleParents.push( {
				name : parentContainer,
				startHeight : startHeight,
				columnWidth : columnWidth,
				columnHeight : columnHeight,
				created : false
			} );

			console.log('start height of column ' + i + 'is ' + circleParents[i - 1].startHeight);
			console.log('start exprience content is ' + $('.experience-content').offset().top);
		}

		// SetWidthOfCircleImages();

		for (var i = 0; i <= 2; i++) {
			//once visible set width and height
			$(circleParents[i].name).css({
				'width': circleParents[ i ].columnWidth,
				'height': circleParents[ i ].columnHeight
			});

			circleParents[i].startHeight = $(circleParents[i].name).offset().top;
			//once dimensions have been set hide element
			var contentName = '.column-content-' + (i + 1);
			$(contentName).hide();
		}

		SetWidthOfDots();
		ResizeWidthOfDots();
		circlesCreated = false;
	}
	// ==================================================

	function CreateSliders(){
		console.log('creating sliders');
		$('.rpwe-ul').slick({
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			dots: false,
			prevArrow: $('#port-prev'),
			nextArrow: $('#port-next'),
		});

		$('.header-scroll').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			dotsClass: 'header-dots'
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
	// ==================================================

	function initVariables(){
		//grab info for nav bar
		navBarToggle = $('.navbar-toggle');
		navMenu = $('#nav-menu');

		//get the parent div of the experience section
		expSection = $('.experience').offset().top;
	}
	// ==================================================

	$(document).ready(function(){
		//grab the inner width when site loads
		windowWidth = window.innerWidth;
		if(windowWidth <= maxWindowWidth ){
			mobile = true;
			console.log('mobile:' +  mobile);
		}else
		{
			mobile = false;
			console.log('mobile:' +  mobile);
		}
		//check for window resize
		$window.resize( function(e) {
			windowWidth = window.innerWidth;
			//Check to see if we're wider than the mobile breakpoint
			if(windowWidth <= maxWindowWidth ){
				mobile = true;
				console.log('mobile:' +  mobile);
			}else
			{
				mobile = false;
				console.log('mobile:' +  mobile);
			}

			SetWidthOfCircleImages();
			if(!responsiveSet){
				SetResponsive();
			}
			ResizeWidthOfDots()
		}); /*window.resize*/

		CreateSliders();

		initVariables();

		GetParentInfo();

		//================================

		expSectionHeight = $('.experience').css('height');

		$('.experience').css({'height': expSectionHeight});
	});
	// ==================================================

	function CreateCircles( circleCount ) {

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

			circles[0] = myCircle01;

			circleImg[0] = $(".circleImg-1");
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

			circles[1] = myCircle02;

			circleImg[1] = $(".circleImg-2");

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

			circles[2] = myCircle03;

			circleImg[2] = $(".circleImg-3");
			//This is here because it's the last circle we create, once created
			// we know that they are all created
			circlesCreated = true;
		}

		//set the radius of the image

		if (circles.length > 0) {
			// console.log(circles);
			for (var i = 0; i < circles.length; i++) {
				//check to see if we already did this
				if (circles[ i ].created == false) {
					console.log('running this');
					circles[i].updateRadius(getWidth());

					//adjust the dimensions and position of the inner circle image
					circleImg[i].css({
						'width': getWidth().toString(),
						'height': getWidth().toString(),
						'top': ( parseInt(circleImg[i].css("width")) / 2).toString() + "px"
					});
					//mark true so we don't loop through this circle again
					circles[ i ].created = true;
				}
			}
		}
	} /*CreateCircles*/
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
		//if the circles have been made don't check any more
		if( !circlesCreated ){
			//only check once we're near the section
			if ($window.scrollTop() >= expSection - 200) {
				for (var i = 0; i < circleParents.length; i++) {
					console.log("window: " + $window.scrollTop());
					// console.log("to get there: " + ( $window.scrollTop() - circleParents[i].startHeight));
					// console.log(circleParents[i].startHeight);
					if ($window.scrollTop() >= circleParents[i].startHeight - 200) {
						if(circleParents[i].created == false) {
							circleParents[i].created = true;
							//the time out stops count of window.scrollTop
							//in mobile this means that you can scroll down and not trigger the next box
							//skip timeout on mobile
							if(!mobile) {
								window.setTimeout(fadeCircles, 1000 * i + 2, i + 1);
							}else
							{
								fadeCircles(i + 1);
							}
						}
					}
				}
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
