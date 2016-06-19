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
						<h1 class="page-title">Check out our team</h1>
						<?php
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</div>
					<div class="header-overlay"></div>
				</div> <!--blog-page-header-->
			</header><!-- .page-header -->




			<div class="archive-main-content">
				<p class="archive-description">Bacon ipsum dolor amet flank filet mignon turkey sirloin alcatra bresaola drumstick pastrami shank capicola ball tip shoulder tenderloin landjaeger. Alcatra ball tip capicola porchetta meatloaf corned beef salami jowl tongue spare ribs leberkas pork loin. Drumstick jerky t-bone ground round, pastrami ham hock frankfurter biltong prosciutto filet mignon spare ribs cow sirloin salami rump.</p>

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
