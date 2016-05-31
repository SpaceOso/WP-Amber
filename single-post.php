<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rico-Amber
 */

get_header(); ?>

	<div id="primary" class=" content-area">
		<div class='blog-page-header'>

			<?php while ( have_posts() ) : the_post(); ?>
			<div class="blog-page-title">
				<h1><?php echo( get_the_title() );?></h1>
				<ul>
					<li>
						Author
					</li>
					<li>
						Date
					</li>
					<li>
						Comment count
					</li>
				</ul>
			</div>

			<img class="blog-header-img" src="<?php echo( get_template_directory_uri() ); ?>/images/post-header.jpg"/>
		</div>
		<?php endwhile; // End of the loop.
		?>
		<div class='blog-page'>
			<main id="main" class="site-main" role="main">
				<div>
					<p><?php echo( get_the_content() ); ?></p>
				</div>

			<!--// get_template_part( 'template-parts/content', get_post_format() );-->
			<!---->
			<!--// the_post_navigation();-->
			<!---->
			<!--//If comments are open or we have at least one comment, load up the comment template.-->
			<!--if ( comments_open() || get_comments_number() ) :-->
			<!--	comments_template();-->
			<!--endif;-->



			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
