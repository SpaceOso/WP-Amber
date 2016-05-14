<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rico-Amber
 */

?>

<?php $myImages = get_bloginfo('template_url'); ?>
	</div><!-- #content -->

	<footer>
			<div class="footer-content">
				<!-- first column - get in touch -->
				<div class="footer-column">
					<div id="footer-colorBox-purple" class="footer-color"></div>
					<h4>Get in touch</h4>
					<ul class="footer-address">
						<li>
							<img class="footer-icon-flag" src="<?php echo(get_template_directory_uri());?>/images/icon-flag.svg">
							<div class="footer-address-text">
								Address: <span class="footer-gray">602 Heritage way, Wilton, NY.</span>
							</div>
						</li>
						<li>
							<img src="<?php echo($myImages); ?>/images/icon-phone.svg">
							Phone: <span class="footer-gray">951-796-6545</span>
						</li>
						<li>
							<img src="<?php echo($myImages); ?>/images/icon-email.svg">
							Email: <span class="footer-gray">miguelricodev@gmail.com</span>
						</li>
					</ul>
					<div class="map">
						<img src="<?php echo($myImages); ?>/images/map.jpg" alt="map of area, saratoga springs">
					</div>
				</div>
				<!-- second column - latest tweets-->
				<div class="footer-column">
					<div id="footer-colorBox-blue" class="footer-color"></div>
					<h4>Latest tweets</h4>
					<ul>
						<li class="tweet">
							<p>CMS Masters And THeir Best Web Design Tools #bestwebdesigntools #webdesign</p>
							<p class="footer-gray">-about 12 min ago</p>
						</li>
						<li class="tweet">
							<p>WOOO COMMERCE functionality added!! See industrial theme become even powerful!</p>
							<p class="footer-gray">-about 47 days ago</p>
						</li>
						<li class="tweet">
							<p>WOOO COMMERCE functionality added!! See industrial theme become even powerful!</p>
							<p class="footer-gray">-about 47 days ago</p>
						</li>
						<li class="tweet">
							<p>CMS Masters And THeir Best Web Design Tools #bestwebdesigntools #webdesign</p>
							<p class="footer-gray">-about 12 min ago</p>
						</li>
					</ul>
				</div>
				<!-- third column - follow us -->
				<div class="footer-column">
					<div id="footer-colorBox-magenta" class="footer-color"></div>
					<h4>Follow us</h4>
					<ul class="follow-us">
						<li>
							<img src="<?php echo($myImages); ?>/images/icon-facebook.svg">
							<p>Like us on Facebook</p>
						</li>
						<li>
							<img src="<?php echo($myImages); ?>/images/icon-twitter.svg">
							<p>Follow us on Twitter</p>
						</li>
						<li>
							<img src="<?php echo($myImages); ?>/images/icon-youtube.svg">
							<p>Watch videos on YouTube</p>
						</li>
						<li>
							<img src="<?php echo($myImages); ?>/images/icon-instagram.svg">
							<p>Friend us on Instagram</p>
						</li>
						<li>
							<img src="<?php echo($myImages); ?>/images/icon-pinterest.svg">
							<p>Repin on Pinterest</p>
						</li>
					</ul>
				</div>
				<!-- Fourth column - popular posts -->
				<div class="footer-column">
					<div id="footer-colorBox-yellow" class="footer-color"></div>
					<h4>Popular posts</h4>
					<ul class="footer-posts">
						<li>
							<p class="post-date">September, 30</p>
							<p class="post-summary">Candy canes dragee pudding. Donut cheesecake I love chocolate icing</p>
						</li>
						<li>
							<p class="post-date">April, 22</p>
							<p class="post-summary">Muffin croissant cookie sesame snaps. Ice cream donut cookie gingerbread</p>
						</li>
						<li>
							<p class="post-date">May, 12</p>
							<p class="post-summary">Cotton candy muffin tart gummies candy danish liquorice chupa chups tootsie roll.</p>
						</li>
					</ul>
				</div>
			</div>
		<!-- </footer> -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rico-amber' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'rico-amber' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'rico-amber' ), 'rico-amber', '<a href="http://miguelricodev.com/" rel="designer">Miguel Rico</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
