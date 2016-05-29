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
				<h1 class="splashText"><span class="torquoise-font"><?php echo( get_field('section_title',167) ); ?> </span><br><?php echo( get_field('section_title', 171 ) ); ?></h1>
			</div> <!-- main-banner -->
		<!-- ===============
			INFO 01
		=============== -->
		<div class="info">
			<h2><?php echo( get_field('section_title', 177) ); ?></h2>
			<p><?php echo( get_field( 'home_page_info', 177 )); ?></p>
			<div id="btn" class="info-button">
				<a href="#">PURCHASE NOW</a>
			</div>
		</div>
		<!-- ===============
			PORTFOLIO
		=============== -->
		<div class="portfolio">
			<h2><?php echo( get_field( 'section_title', 181 ) ); ?></h2>
		<div class="portfolio-description">
				<p><?php echo( get_field( 'home_page_info', 181  )); ?></p>
		</div>
			<div id='post-viewer' class="portfolio-content">
				<div class="port-row">
					<!-- select all the portfolio posts -->
					<?php $myquery  = new WP_Query('category_name=portfolio');
					if( $myquery -> have_posts() ) :
						while( $myquery ->have_posts() ) :
							$myquery ->the_post(); ?>
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
					<?php	endwhile;
					endif;?>
					<? wp_reset_postdata(); ?>
				</div>
			</div> <!-- port-viewer -->
			<div class="port-btn-container">
				<div id='port-prev' class="port-btn noselect"><</div>
				<div id='port-next' class="port-btn noselect">></div>
			</div>
		</div>
		<!-- ===============
			FEATURES
		=============== -->
		<div class="features">
			<h2><?php echo( get_field( 'section_title', 183 )); ?></h2>
			<div class="features-content">
			<!-- first column -->
			<?php $args = array(
				'post_type' => 'company-features',
				'posts_per_page' => 4,
			); ?>
			<?php $companyQuery = new WP_Query( $args);
				$postCount = 0;
				$currentCount = 0;
				if ( $companyQuery->have_posts() ) :
					$postCount = $companyQuery->post_count;
					while( $companyQuery->have_posts() ) :
						//We want to create two columns, in each column add 2 posts
						 while( $currentCount < 2 ) : ?>
							<div class="features-content-column">
								<?php for( $i = 0; $i < $postCount / 2; $i++ ) : ?>
									<?php $companyQuery->the_post(); ?>
										<div class="features-column-row">
											<img class="style-convert" src="<?php the_post_thumbnail_url(); ?>">
											<div class="features-row-text">
												<h3><?php echo( get_the_title() ); ?></h3>
												<p><?php the_field( 'test_field', null ); ?></p>
											</div>
										</div>
								<?php endfor; ?>
								<?php $currentCount++; ?>
							</div>
						 <?php endwhile; ?>
				<?php endwhile; ?>
			<?php endif;  ?>
			<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<!-- ===============
			QUOTE
		=============== -->
		<div class="quote">
			<div class="quote-text">
				<?php $mynewQuery  = new WP_Query('category_name=quotes&posts_per_page=3');
					if( $mynewQuery -> have_posts() ) :
						while( $mynewQuery->have_posts() ) :
							$mynewQuery->the_post(); ?>
							<div>
								<h3><?php echo(get_the_content()); ?></h3>
								<p class="torquoise-font"><?php echo(get_post_meta( $post->ID, "source", true )); ?></p>
							</div>
						<?php endwhile;
					endif;?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<!-- ===============
			BLOG POSTS
		=============== -->
		<div class="blog-posts">
			<h2 class="gray-font"><?php echo( get_field( 'section_title', 192 ) ); ?></h2>
				<!-- first column -->
				<?php $blogQuery = new WP_Query('category_name=articles&posts_per_page=3');
					if($blogQuery -> have_posts() ) :
						while($blogQuery->have_posts()) :
							$blogQuery->the_post();	?>
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
						<p class="gray-font"><?php echo(get_the_content());?></p>
						<div class="blog-posts-details">
							<a class="torquoise-font blog-learnMore" href="<?php the_permalink(); ?>">Learn more</a>
							<div class="gray-font blog-commentCount icon-bubbles2">
								<a href="<?php the_permalink(); ?>">450</a>
							</div>
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
					</div>
					<div class="experience-column-text">
						<h3 id='exp-first'>0</h3>
						<p>years of web development</p>
					</div>
				</div>
				<!-- first ellipse -->
			<div class="eillipse-column">
					<div class="experience-ellipses-wrapper">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
				</div>
			</div>
				<!-- second column -->
				<div class="experience-column">
					<div class="experience-content-graphics">
						<img src="<?php echo($myImages); ?>/images/shape-phone.png">
					</div>
					<div class="experience-column-text">
						<h3 id='exp-second'>0</h3>
						<p>results of the last winter year</p>
					</div>
				</div>
				<!-- second ellipse -->
				<div class="eillipse-column">
					<div class="experience-ellipses-wrapper">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
					</div>
				</div>
				<!-- third column -->
				<div class="experience-column">
					<div class="experience-content-graphics">
						<img src="<?php echo($myImages) ?>/images/shape-rocket.png">
					</div>
					<div class="experience-column-text">
						<h3 id='exp-third'>0</h3>
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
					<!--<div class="team-member-info">-->
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
					<!--</div>-->
				</div>
				<?php endwhile;
					endif;?>
				<? wp_reset_postdata(); ?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// 
get_footer();
