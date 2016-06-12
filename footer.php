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
				<div class="footer-column" id="address-column">
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
				<div class="footer-column" id="tweet-column">
					<div id="footer-colorBox-blue" class="footer-color"></div>
					<h4>Latest tweets</h4>
					<div class="tweets">
						<?php
						// draft sample display for array returned from oAuth Twitter Feed for Developers WP plugin
						// http://wordpress.org/extend/plugins/oauth-twitter-feed-for-developers/

						$tweets = getTweets(4, 'MR_WebDev');//change number up to 20 for number of tweets
						if(is_array($tweets)){

							// to use with intents
							echo '<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>';

							foreach($tweets as $tweet){

								if($tweet['text']){
									$the_tweet = $tweet['text'];
									/*
									Twitter Developer Display Requirements
									https://dev.twitter.com/terms/display-requirements

									2.b. Tweet Entities within the Tweet text must be properly linked to their appropriate home on Twitter. For example:
									  i. User_mentions must link to the mentioned user's profile.
									 ii. Hashtags must link to a twitter.com search with the hashtag as the query.
									iii. Links in Tweet text must be displayed using the display_url
										 field in the URL entities API response, and link to the original t.co url field.
									*/

									// i. User_mentions must link to the mentioned user's profile.
									if(is_array($tweet['entities']['user_mentions'])){
										foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
											$the_tweet = preg_replace(
												'/@'.$user_mention['screen_name'].'/i',
												'<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
												$the_tweet);
										}
									}

									// ii. Hashtags must link to a twitter.com search with the hashtag as the query.
									if(is_array($tweet['entities']['hashtags'])){
										foreach($tweet['entities']['hashtags'] as $key => $hashtag){
											$the_tweet = preg_replace(
												'/#'.$hashtag['text'].'/i',
												'<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
												$the_tweet);
										}
									}

									// iii. Links in Tweet text must be displayed using the display_url
									//      field in the URL entities API response, and link to the original t.co url field.
									if(is_array($tweet['entities']['urls'])){
										foreach($tweet['entities']['urls'] as $key => $link){
											$the_tweet = preg_replace(
												'`'.$link['url'].'`',
												'<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
												$the_tweet);
										}
									}
									?>

									<?php
									// 3. Tweet Actions
									//    Reply, Retweet, and Favorite action icons must always be visible for the user to interact with the Tweet. These actions must be implemented using Web Intents or with the authenticated Twitter API.
									//    No other social or 3rd party actions similar to Follow, Reply, Retweet and Favorite may be attached to a Tweet.
									// get the sprite or images from twitter's developers resource and update your stylesheet
									echo '
									<div class="twitter_intents">
										<p class="tweet-content">' .$the_tweet.'</p>
										<div class="tweet-links">
							                <a class="reply" href="https://twitter.com/intent/tweet?in_reply_to='.$tweet['id_str'].'">Reply</a>
							                <a class="retweet" href="https://twitter.com/intent/retweet?tweet_id='.$tweet['id_str'].'">Retweet</a>
							                <a class="favorite" href="https://twitter.com/intent/favorite?tweet_id='.$tweet['id_str'].'">Favorite</a>
										</div>
									</div>';


									// 4. Tweet Timestamp
									//    The Tweet timestamp must always be visible and include the time and date. e.g., “3:00 PM - 31 May 12”.
									// 5. Tweet Permalink
									//    The Tweet timestamp must always be linked to the Tweet permalink.
									echo '
							        <div class="timestamp">
							            <a href="https://twitter.com/YOURUSERNAME/status/'.$tweet['id_str'].'" target="_blank">'.date('h:i A M d',strtotime($tweet['created_at']. '- 5 hours')).'</a>
							        </div>';// -8 GMT for Pacific Standard Time
								} else {
									echo '
						        <br /><br />
						        <a href="http://twitter.com/YOURUSERNAME" target="_blank">Click here to read YOURUSERNAME\'S Twitter feed</a>';
								}
							}
						}
						?>

					</div>
					<?php //dynamic_sidebar('follow_us');?>
					<!--<a class="twitter-timeline" data-lang="en" data-width="240" data-height="320" href="https://twitter.com/MR_WebDev">Tweets by MR_WebDev</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>-->


					<!--<ul>-->
					<!--	<li class="tweet">-->
					<!--		<p>CMS Masters And THeir Best Web Design Tools #bestwebdesigntools #webdesign</p>-->
					<!--		<p class="footer-gray">-about 12 min ago</p>-->
					<!--	</li>-->
					<!--	<li class="tweet">-->
					<!--		<p>WOOO COMMERCE functionality added!! See industrial theme become even powerful!</p>-->
					<!--		<p class="footer-gray">-about 47 days ago</p>-->
					<!--	</li>-->
					<!--	<li class="tweet">-->
					<!--		<p>WOOO COMMERCE functionality added!! See industrial theme become even powerful!</p>-->
					<!--		<p class="footer-gray">-about 47 days ago</p>-->
					<!--	</li>-->
					<!--	<li class="tweet">-->
					<!--		<p>CMS Masters And THeir Best Web Design Tools #bestwebdesigntools #webdesign</p>-->
					<!--		<p class="footer-gray">-about 12 min ago</p>-->
					<!--	</li>-->
					<!--</ul>-->
				</div>
				<!-- third column - follow us -->
				<div class="footer-column" id="follow-us-column">
					<div id="footer-colorBox-magenta" class="footer-color"></div>
					<h4>Follow us</h4>
					<?php dynamic_sidebar( 'Social-Icons'); ?>
				</div>
				<!-- Fourth column - popular posts -->
				<div class="footer-column" id="post-column">
					<div id="footer-colorBox-yellow" class="footer-color"></div>
					<h4>Popular posts</h4>
					<ul class="footer-posts">
						<?php $footerPostQuery = new WP_Query("category_name=articles");
							if( $footerPostQuery -> have_posts() ) :
								while( $footerPostQuery -> have_posts() ) :
									$footerPostQuery -> the_post(); ?>
						<li >
							<a href="<?php the_permalink(); ?>">
								<p class="post-date"><?php echo ( get_the_date() ); ?></p>
								<p class="post-summary torquoise-font"><?php echo ( get_the_title() ); ?></p>
							</a>

						</li>
						<?php
							endwhile;
						endif;
						?>
					</ul>
				</div>
			</div>
		<!-- </footer> -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rico-amber' ) ); ?>">
				<?php printf( esc_html__( 'Proudly powered by %s', 'rico-amber' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'rico-amber' ), 'rico-amber',
				'<a href="http://miguelricodev.com/" rel="designer">Miguel Rico</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
