<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rico-Amber
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					$teamCatHeader = get_theme_mod('team_cat_header', get_bloginfo('template_url') . '/images/post-header.jpg');
				?>
				<div id='cat-team' class='blog-page-header' style="background-image: url('<?php echo $teamCatHeader; ?>')">
					<div class="blog-page-title">
						<h1 id='cat-team-title' class="page-title"><?php echo get_theme_mod('team_cat_title');?></h1>
						<?php
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</div>
					<div class="header-overlay"></div>
				</div> <!--blog-page-header-->
			</header><!-- .page-header -->




			<div class="archive-main-content">
				<p id="team-cat-desc" class="archive-description"><?php echo get_theme_mod('port_cat_desc', 'Use customizer to fill this area in');?></p>

					<?php $categoryChosen = 'template-parts/content-team-members';

					while ( have_posts() ) : the_post();

						get_template_part($categoryChosen);

					endwhile;

					the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div>

			</div><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
