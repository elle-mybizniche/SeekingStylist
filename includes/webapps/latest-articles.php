<section class="featured-articles">
	<div class="grid-container">
		<h2>articles</h2>
		<div class="grid-x grid-margin-x">
			<?php 
			    $query = new WP_Query( array(
			        'post_type' => 'post',
			        'post_status' => 'publish',
			        'posts_per_page' => 3
			    ));
			    while ($query->have_posts()) : $query->the_post();
			?>

				<div class="cell">
					<article>
						<div class="thumb">
							<a href="<?= get_the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						<h3><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p>
							<?php
                                $sContent = strip_tags(get_the_content()); 
                                $sContent = substr( $sContent, 0, 165 );
                                $sContent = substr( $sContent, 0, strrpos( $sContent, ' ' ) );
                                echo $sContent;
                            ?>
						</p>
					</article>
				</div>

			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>