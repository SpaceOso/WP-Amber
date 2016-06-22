<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 6/20/16
 * Time: 12:39 PM
 */

?>

<!--BLOG START-->
<div class='blog-page'>
	<div class="article-post-container">
		<div class="page-content">
			<?php  the_content();?>
			<div class="page-tags">
				<?php the_tags('<p>Tags:</p><ul><li>', ',</li><li>', '</li></ul>' ); ?>
			</div>
		</div><!-- page-content -->
		<?php get_sidebar();?>
	</div>
</div> <!--blog-page-->

