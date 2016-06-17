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
			<div class="our-team-content">
				<!-- first column -->
						<div class="our-team-column">
							<div class='team-member-picture'>
								<?php the_post_thumbnail(); ?>
								<div class="member-name-slider">
									<div id="<?php echo($post->ID); ?>" class="team-member-info">
										<p class="team-name"><?php echo( get_the_title() );?></p>
										<p class="team-title gray-font"><?php echo( get_post_meta($post->ID, 'job-title', true) ); ?></p>
									</div>
									<div>
										<p class="team-excerpt gray-font"><?php echo( get_the_excerpt() ); ?></p>
									</div>
								</div>
							</div> <!-- member-picture -->
							<div  id="btn" class="team-profile-btn torquoise-font">
								<a href="<?php echo( get_the_permalink() ); ?>">PROFILE</a>
							</div>
						</div>
			</div>

		<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

		<?php
	endif; ?>


	<div class="entry-content">
		<?php

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rico-amber' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
