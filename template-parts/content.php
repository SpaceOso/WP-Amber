Skip to content
This repository
Search
Pull requests
Issues
Gist
@WebDevMR
Unwatch 1
Star 0
Fork 0 WebDevMR/WP-Amber
Code  Issues 0  Pull requests 0  Wiki  Pulse  Graphs  Settings
Branch: master Find file Copy pathWP-Amber/template-parts/content.php
d900f8d  25 days ago
@WebDevMR WebDevMR added icon fonts. Worked on widget for social links for footer. Worke…
1 contributor
RawBlameHistory     48 lines (41 sloc)  1.23 KB
<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rico-Amber
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php rico_amber_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( sprintf(
		/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rico-amber' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rico-amber' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-footer">
		<?php rico_amber_entry_footer(); ?>
	</div>
</article><!-- #post-## -->
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help