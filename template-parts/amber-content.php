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