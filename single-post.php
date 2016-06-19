<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rico-Amber
 */

get_header(); ?>
<!--START OF PAGE-->
	<div id="primary" class=" content-area">
		<!--HEADER/START-->
		<div class='blog-page-header'>
			<?php
			global $post;
			$post = $post_object;
			setup_postdata($post);
			if(have_posts()) :
			while ( have_posts() ) : the_post(); ?>
			<!--page title-->
			<div class="blog-page-title">
				<h1><?php echo( get_the_title() );?></h1>
				<div class="post-details">
					<div id="post-author">
						<p>by <?php echo( get_the_author() );?></p>
					</div>
					<div id="post-date">
						<p><?php echo( get_the_date() );?></p>
					</div>
					<div id="post-comment-count">
						<p><?php echo( comments_number('No Comments', '1 Comment', '% Comments') );?></p>
					</div>
				</div> <!--post-details-->
			</div>
			<!--page title-->
			<div class="header-overlay"></div>
		</div> <!--blog-page-header-->
		<!--HEADER/END-->

		<!--BLOG START-->
		<div class='blog-page'>
			<div class="page-content">
					<?php  the_content();?>
				<!--SIDEBAR-->
				<?php get_sidebar();?>
			</div><!-- page-content -->

			<div class="page-tags">
				<?php the_tags('<p>Tags:</p><ul><li>', ',</li><li>', '</li></ul>' ); ?>
			</div>

		</div> <!--blog-page-->

		<!--RELATED POSTS-->
		<div class="related-posts-container">
			<?php related_posts(); ?>
		</div>
		<!--RELATED POSTS END-->
		<?php endwhile; // End of the loop.
			wp_reset_postdata();
		endif;	?>

		<!--COMMENTS-->
		<section class="comments-parent">
			<?php comments_template(); ?>
			<?php //comment_form(); ?>
		</section>
		<!--COMMENTS END-->
	</div><!-- #primary -->

<?php
get_footer();


