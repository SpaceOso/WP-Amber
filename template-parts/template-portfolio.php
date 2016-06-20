<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 6/20/16
 * Time: 12:28 PM
 */

?>

<!--BLOG START-->
<div class='blog-page'>
	<div class="page-content port-content">
		<div class="port-image">
			<?php $thisPostDetails = get_field('project_image');
				// var_dump($thisPostDetails);
			?>
			<img src="<?php echo $thisPostDetails['url']; ?>">
		</div>

		<div class="port-post-content">
			<?php  the_content();?>
		</div>
		
		<div class="page-tags">
			<?php the_tags('<p>Tags:</p><ul><li>', ',</li><li>', '</li></ul>' ); ?>
		</div>
	</div><!-- page-content -->
	<?php //get_sidebar();?>
</div> <!--blog-page-->