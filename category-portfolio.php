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
				<?php //if(get_theme_mod('portfolio_cat_header') != ''){
					$portCatHeader = get_theme_mod('portfolio_cat_header', get_bloginfo('template_url') . '/images/post-header.jpg');
				// }; ?>
				<div id='cat-portfolio' class='blog-page-header' style="background-image: url('<?php echo $portCatHeader; ?>')">
					<div class="blog-page-title">
						<h1 id="cat-portfolio-title" class="page-title"><?php echo get_theme_mod('portfolio_cat_title', 'Check out our latest works!');?></h1>
						<?php
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</div>
					<div class="header-overlay"></div>
				</div> <!--blog-page-header-->
			</header><!-- .page-header -->


			<?php
			$categoryChosen = '';
			/* Start the Loop */
			//figure out what set of categories we're going to display
			if(has_category('portfolio')){ ?>
			<div class="archive-main-content">
				<p id="port-cat-desc" class="archive-description"><?php echo get_theme_mod('port_cat_desc', 'Use customizer to fill this area in');?></p>
				<?php $categoryChosen = 'template-parts/content-portfolio';
				}else if(has_category('articles') ){ ?>
				<div id="cat-articles-parent" class="archive-main-content">
					<?php $categoryChosen = 'template-parts/category-articles';
					};

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
