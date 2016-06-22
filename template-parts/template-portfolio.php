<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 6/20/16
 * Time: 12:28 PM
 */

?>

<!--BLOG START-->
<div id='port-post' class='blog-page'>
	<div class="page-content port-content">
	<!--<div class="port-content">-->

		<div class="port-image">
			<?php
			// grab the info and spit out image
			$thisPostDetails = get_field('project_image');?>
			<img src="<?php echo $thisPostDetails['url']; ?>">
		</div>

		<div class="port-post-content">
			<div class="port-post-buttons">
				<div class='prev-btn port-btn'>
					<a href="<?php echo get_permalink(get_adjacent_post(true,'',false)); ?> ">&lt;</a>
				</div>
				<div class='next-btn port-btn'>
					<a href="<?php echo get_permalink(get_adjacent_post(true,'',true)); ?> ">&gt;</a>
				</div>
			</div>
			<div class="recommend-count">
				<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
			</div>
			<?php
			// the content, which acts like sidebar
			the_content();?>
		</div>
		
		<!--<div class="page-tags">-->
		<!--	--><?php //the_tags('<p>Tags:</p><ul><li>', ',</li><li>', '</li></ul>' ); ?>
		<!--</div>-->
	</div><!-- page-content -->
</div> <!--blog-page-->