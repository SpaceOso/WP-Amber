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
				<div class='blog-page-header'>
					<div class="blog-page-title">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
						</div>
					<img class="blog-header-img" src="<?php echo( get_template_directory_uri() ); ?>/images/post-header.jpg"/>
					<div class="header-overlay"></div>
				</div> <!--blog-page-header-->
			</header><!-- .page-header -->

			<!--<div class="archive-main-content">-->
				<?php
				$categoryChosen = '';
				/* Start the Loop */
				//figure out what set of categories we're going to display
				if(has_category('portfolio')){ ?>
					<div class="archive-main-content">
					<?php $categoryChosen = 'template-parts/category-portfolio';
				}else if(has_category('articles') ){ ?>
					<div class="arch-cat-articles">
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
get_sidebar();
get_footer();
