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
		<!--<div class="entry-meta">-->
		<?php //rico_amber_posted_on(); ?>
		<?php //echo( the_post_thumbnail('blog-posts') );?>

		<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<!--<div id='post-viewer'>-->
		<div class="archive-row-portfolio">
			<!-- select all the portfolio posts -->
			<div id='<?php echo(get_the_title())?>' class="portfolio-column">
				<div class="port-img-container">
					<!--info icons-->
					<ul class="port-icons">
						<li class="port-like">
							<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
						</li>
						<li class="port-zoom">
							<a rel='lightbox' href="<?php the_post_thumbnail_url(); ?>"></a>
						</li>
						<li class="port-link">
							<a href="<?php the_permalink(); ?>"></a>
						</li>
					</ul>
					<!--bottom panel-->
					<div class='img-info'>
						<div class="img-name">
							<p class="title"><?php echo( get_the_title() ); ?></p>
							<p class="torquoise-font"><?php echo( get_the_category_list(", ") ); ?> </p>
						</div>
						<div class="img-likes">
							<div class="heart">
								<img src="<?php echo(get_template_directory_uri());?>/images/heart.svg">
							</div>
							<p class="countUpdate"><?php echo( dot_column_content('likes', $post->ID) ); ?></p>
						</div>
					</div>
					<!--background image-->
					<div class="overlay"></div>
					<?php the_post_thumbnail('portfolio-scroller'); ?>
				</div>
			</div>
			<!--</div>-->
			<!--</div> <!-- port-viewer -->
			<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->






		</div><!-- .entry-meta -->
		<?php
	endif; ?>


	<div class="entry-content">
		<?php
		// the_content( sprintf(
		// /* translators: %s: Name of current post. */
		// 	wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rico-amber' ), array( 'span' => array( 'class' => array() ) ) ),
		// 	the_title( '<span class="screen-reader-text">"', '"</span>', false )
		// ) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rico-amber' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<!--<div class="entry-footer">-->
	<!--	--><?php //rico_amber_entry_footer(); ?>
	<!--</div>-->
</article><!-- #post-## -->
