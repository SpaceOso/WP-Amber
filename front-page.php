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
				<?php $args = array(
					'post_type' => 'header_images',
					'orderby'   => 'date',
					'order'     => 'ASC',
				); ?>
				<?php $bannerQuery = new WP_Query($args)?>
					<?php if ($bannerQuery->have_posts() ) : ?>
						<div class="header-scroll">
						<?php while($bannerQuery->have_posts() ) : ?>
							<?php $bannerQuery->the_post();
								$image = get_field('header_image');?>
							<div class="header-slider">
								<img src="<?php echo( $image['url'] ); ?>">
								<div class="splashText">
									<h1><span style="color: <?php echo( get_field('header_text_color') );?>"><?php echo( get_field('header_text') ); ?> </span>
										<br><?php echo( get_field('sub_header_text' ) ); ?></h1>
								</div>
							</div>

							<?php endwhile;
							wp_reset_postdata();
							endif;
							?>
						</div>
				<!-- SPLASH -->

			</div> <!-- main-banner -->
		<!-- ===============
			INFO 01
		=============== -->
		<div class="info">
			<!--<h2>--><?php //echo( get_field('section_title', 177) ); ?><!--</h2>-->
			<h2 id="info-header"> <?php echo get_theme_mod('info_header', 'info text'); ?> </h2>
			<p id="info-paragraph"><?php echo get_theme_mod('info_paragraph', 'use customize option to fill this in') ?></p>
			<div id="btn" class="info-button">
				<a href="#">PURCHASE NOW</a>
			</div>
		</div>
		<!-- ===============
			PORTFOLIO
		=============== -->
		<!--check to see if the user has uploaded an image or not-->
		<?php if( get_theme_mod('portfolio_bg')  != '') {
			$portfolioBg = get_theme_mod( 'portfolio_bg' );
		};?>
		<div class="portfolio" style="background-image:url('<?php echo $portfolioBg;?>')">
			<h2 id="portfolio-header"><?php echo get_theme_mod('portfolio_header', 'Portfolio section'); ?></h2>
		<div class="portfolio-description">
			<p id="portfolio-desc"><?php echo get_theme_mod('portfolio_desc', 'use customize option to fill text in here.'); ?></p>
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
					wp_reset_postdata();
					endif;?>

				</div>
			</div> <!-- port-viewer -->
			<div class="port-btn-container">
				<div id='port-prev' class="port-btn noselect"><</div>
				<div id='port-next' class="port-btn noselect">></div>
			</div>
		</div> <!--portfolio-->
		<!-- ===============
			FEATURES
		=============== -->
		<div class="features">
			<h2 id="features-header"><?php echo get_theme_mod('features_header', 'Superb Features');?></h2>
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
				<?php endwhile;
					wp_reset_postdata();
				endif;  ?>
			</div>
		</div> <!--features-->
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
						wp_reset_postdata();
					endif;?>
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
								<a href="<?php the_permalink(); ?>"><?php echo ($post->comment_count );?></a>
							</div>
						</div>
					</div>
				</div>
				<?php
					endwhile;
						wp_reset_postdata();
				endif;?>
				<!-- first column -->
		</div> <!--blog-post-->
		<!-- ===============
			COMPANY EXPERIENCE
		=============== -->
		<div class="experience">
			<h2>Company experience</h2>
			<div class="experience-content">
				<!-- first column -->
				<div class="experience-column" id="column-1">
					<div class="column-content-1">
						<div class="experience-content-graphics">
							<div class="circle" id="circles-1"></div>
							<div class="circleImg-1"></div>
						</div>
						<div class="experience-column-text">
							<p>years of web development</p>
						</div>
					</div>
				</div>
				<!-- first ellipse -->
				<div class="ellipses-column">
					<div class="experience-ellipses-wrapper">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
				</div>
			</div>
				<!-- second column -->
				<div class="experience-column" id="column-2">
					<div class="column-content-2">
						<div class="experience-content-graphics">
							<div class="circle" id="circles-2"></div>
							<div class="circleImg-2"></div>
						</div>
						<div class="experience-column-text">
							<p>results of the last winter year</p>
						</div>
					</div>
				</div>
				<!-- second ellipse -->
				<div class="ellipses-column">
					<div class="experience-ellipses-wrapper">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
						<img src="<?php bloginfo('template_directory');?>/images/ellipse.svg">
					</div>
				</div>
				<!-- third column -->
				<div class="experience-column" id="column-3">
					<div class="column-content-3">
						<div class="experience-content-graphics">
							<div class="circle" id="circles-3"></div>
							<div class="circleImg-3"></div>
						</div>
						<div class="experience-column-text">
							<p>euros of the military budget</p>
						</div>
					</div>
				</div>
			</div>
		</div> <!--experience-->
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
				<?php endwhile;
						wp_reset_postdata();
					endif;?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
