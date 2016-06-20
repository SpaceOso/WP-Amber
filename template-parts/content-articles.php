<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rico-Amber
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('amber-archive'); ?>>

	<?php
	if ( is_single() ) {
		// the_title( '<h1 class="entry-title">', '</h1>' );
	} else {
		// the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	}

	if ( 'post' === get_post_type() ) : ?>

		<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<div  class="blog-posts">
			<!-- first column -->
			<div class="blog-posts-column">
				<div class="blog-image-wrapper">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('blog-posts');?>
					</a>
				</div>
				<div class="blog-posts-content">
					<!-- post title -->
					<a href="<?php the_permalink(); ?>">
						<div>
							<h3 class="torquoise-font blog-title"><?php echo(get_the_title());?></h3>
						</div>
					</a>
					<p class="gray-font"><?php echo(get_the_excerpt());?></p>
					<div class="blog-posts-details">
						<a class="torquoise-font blog-learnMore" href="<?php the_permalink(); ?>">Learn more</a>
						<div class="gray-font blog-commentCount icon-bubbles2">
							<a href="<?php the_permalink(); ?>"><?php echo ($post->comment_count );?></a>
						</div>
					</div>
				</div>
			</div>
			<!-- first column -->
		</div> <!--blog-post-->
		<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
	endif; ?>

</article><!-- #post-## -->
