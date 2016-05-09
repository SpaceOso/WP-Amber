<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rico-Amber
 */


get_header(); ?>

<?php $myImages = get_bloginfo('template_url'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="main-banner">
				<!-- SPLASH -->
				<h1 class="splashText"><span class="torquoise-font">Creating a unique look.</span><br>Never been easier.</h1>
			</div> <!-- main-banner -->
		<!-- ===============
			INFO 01
		=============== -->
		<div class="info">
			<h2>Steal of the month</h2>
			<p>That we can tuck in our children at night and know that they are fed and clothed and safe from harm. Our trials and triumphs became at once unique and universla.</p>
			<div class="info-button">PURCHASE NOW</div> 
		</div>
		<!-- ===============
			PORTFOLIO
		=============== -->
		<div class="portfolio">
			<h2>Latest works</h2>
			<p>That we can tuck in our children at night and know that they are fed and clothed and safe from harm. Our trials and triumphs became at once unique and universla.</p>
			<div class="portfolio-content">
				<!-- select all the portfolio posts -->
				<?php $myquery  = new WP_Query('category_name=portfolio');
				if( $myquery -> have_posts() ) :
				 	while( $myquery ->have_posts() ) : 
						$myquery ->the_post(); ?>
					<div class="portfolio-column">
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail( ); ?>
						</a>
					</div>
				<?php 
					endwhile;
				endif;?>
				<? wp_reset_postdata(); ?>

			</div>
			<div class="portfolio-buttons">
				<div class="portfolio-button-prev"><</div>
				<div class="portfolio-button-next">></div>
			</div>
		</div>
		<!-- ===============
			FEATURES
		=============== -->
		<div class="features">
			<h2>Superb features</h2>
			<div class="features-content">
			<!-- first column -->
				<div class="features-content-column">
				<!-- first row -->
					<div class="features-column-row">
						<img src="<?php echo(get_template_directory_uri());?>/images/shape-star.svg">
						<div class="features-row-text">
							<h3>Brilliant creative design</h3>
							<p>Ah, well! It means much the same thing, said the Duchess, digging her sharp little chin tino Alice's shoulder as she added, and the moral of that is m-dash.</p>
						</div>
					</div>
					<!-- second row -->
					<div class="features-column-row">
						<img src="<?php echo(get_template_directory_uri());?>/images/shape-wand.svg">
						<div class="features-row-text">
							<h3>Incredible documentation</h3>
							<p>Alice went timidly up to the doorm and knocked. 'There's no sort of use in knocking,' said the Footman, and that for two reasons.</p>
						</div>
					</div>
				</div>
				<!-- end of first column -->
				<div class="features-content-column">
					<!-- first row second column -->
					<div class="features-column-row">
						<img src="<?php echo(get_template_directory_uri());?>/images/shape-trophy.svg">
						<div class="features-row-text">
							<h3>On mouse over tittle</h3>
							<p>Then they both bowed low, and their curls got entangled toether. Alice laughed so much at this, that she had to run back into the wood for frear of their hearing her.</p>
						</div>
					</div>
					<!-- second row second column -->
					<div class="features-column-row">
						<img src="<?php echo(get_template_directory_uri());?>/images/shape-cloud.svg">
						<div class="features-row-text">
							<h3>Responsive & retina ready</h3>
							<p>Alice went timidly up to the door, and knocked. Theres no sort of use in knocking, said the Footman, and that for two reasons. First, because I'm on the same side.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ===============
			QUOTE
		=============== -->
		<div class="quote">
			<div class="quote-text">
				<?php $mynewQuery  = new WP_Query('category_name=quotes&posts_per_page=1');
					if( $mynewQuery -> have_posts() ) :
						while( $mynewQuery->have_posts() ) : 
							$mynewQuery->the_post(); ?>
					<h3>
						<?php echo(get_the_content()); ?>
					</h3>
					<p class="torquoise-font"><?php echo(get_post_meta( $post->ID, "source", true )); ?></p>
				<?php endwhile; 
				endif;?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<!-- ===============
			BLOG POSTS
		=============== -->
		<div class="blog-posts">
			<h2 class="gray-font">Latest blog posts</h2>
				<!-- first column -->
				<?php $blogQuery = new WP_Query('category_name=articles&posts_per_page=3');
					if($blogQuery -> have_posts() ) :
						while($blogQuery->have_posts()) :
							$blogQuery->the_post();	?>
				<div class="blog-posts-column">
					<div class="blog-image-wrapper">
						<?php the_post_thumbnail();?>
					</div>
					<div class="blog-posts-content">
						<h3 class="torquoise-font"><?php echo(get_the_title());?></h3>
						<p class="gray-font"><?php echo(get_the_content());?></p>
						<div class="blog-posts-details">
							<a class="torquoise-font blog-posts-learnMore" href="#">Learn more</a>
							<div class="gray-font blog-posts-commentCount">450</div>
						</div>
					</div>
				</div>
				<?php 
					endwhile; 
				endif;?>
				<? wp_reset_postdata(); ?>

				<!-- first column -->
		</div>
		<!-- ===============
			COMPANY EXPERIENCE
		=============== -->
		<div class="experience">
			<h2>Company experience</h2>
			<div class="experience-content">
				<!-- first column -->
				<div class="experience-column">
					<div class="experience-content-graphics">
						<img src="<?php echo($myImages); ?>/images/shape-cogs.png">
						<!-- first ellipse -->
						<div class="experience-ellipses-wrapper">
							<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
							<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
							<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						</div>
					</div>
					<div class="experience-column-text">
						<h1>500</h1>
						<p>years of web development</p>
					</div>
				</div>
				<!-- second column -->
				<div class="experience-column">
					<div class="experience-content-graphics">
						<img src="<?php echo($myImages); ?>/images/shape-phone.png">
						<!-- second ellipse -->
						<div class="experience-ellipses-wrapper">
							<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
							<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
							<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						</div>
					</div>
					<div class="experience-column-text">
						<h1>25000</h1>
						<p>results of the last winter year</p>
					</div>
				</div>
				<!-- third column -->
				<div class="experience-column">
					<div class="experience-content-graphics">
						<img src="<?php echo($myImages) ?>/images/shape-rocket.png">
					</div>
					<div class="experience-column-text">
						<h1>100000</h1>
						<p>euros of the military budget</p>
					</div>
				</div>
			</div>
		</div>
		<!-- ===============
			OUR TEAM
		=============== -->
		<div class="our-team">
			<h2 class="gray-font"> Our team</h2>
			<div class="our-team-content">
				<!-- first column -->
				<?php $team_query = new WP_Query('category_name=team members');
					if( $team_query -> have_posts() ) :
						while( $team_query -> have_posts()) :
							$team_query -> the_post(); ?>
				<div class="our-team-column">
					<div class="team-member-info">
						<div id="<?php echo($post->ID); ?>" class="team-member-name">
							<p><?php echo( get_the_title() );?></p>
							<p><?php echo( get_post_meta($post->ID, 'job-title', true) ); ?></p>
						</div>
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="team-profile-btn torquoise-font">PROFILE
					</div>
				</div>
				<?php endwhile; 
					endif;?>
				<? wp_reset_postdata(); ?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();