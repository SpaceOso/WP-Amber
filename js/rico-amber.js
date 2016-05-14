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

	$(document).ready(function(){
		//find all the portfolio columns and add them to an array
		postViewer = $('#post-viewer');
		$('.portfolio-column').each(function(index, element){
			portColumns.push(element);
		});

		//grab the width of 1 post
		postWidth = $( portColumns[1] ).outerWidth( true );
		//multiply the width of 1 post by how many we want displayed to set the width of the parent container
		postViewerWidth = postWidth * numberOfPosts;

		postViewer.width(postViewerWidth);

		portPrev = $('#port-prev');
		portNext = $('#port-next');
		portPostRow = $('.port-row');
		portPostRowPositoin = portPostRow.position();

	});


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

		portPrev.on('click', null, {btn: 'prev'},SlidePostRow );
		portNext.on('click', null, {btn: 'next'}, SlidePostRow );

		$(".team-profile-btn").mouseleave(function() {
			$( this ).closest(".team-member-info").find(".team-member-name")
			.toggle('drop', {direction: 'down'});
		});

	});
}(jQuery));
