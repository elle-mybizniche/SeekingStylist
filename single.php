<?php get_header() ?>
<main class="blog-detailed-page">
	<div class="grid-container">
		<?php if(have_posts()): ?>
		    <?php while(have_posts()): the_post() ?>

		    	<div class="blog-header text-center">
		    		<a href="/articles/" class="back-articles">
		    			<svg style="width: 20px; height: 18px; vertical-align: middle;" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" class=""></path></svg>
		    			<span>ARTICLES</span>
		    		</a>

		    		<h1><?php the_title(); ?></h1>
		    		<h6><?php echo the_category(', '); ?></h6>
		    		<?= get_template_part( 'template-parts/content', 'social-button' ); ?>
		    		
		    	</div>

		    	<div class="blog-body">
		    		<?php the_content() ?>
		    	</div>


		    	<div class="blog-footer">
		    		<?= get_template_part( 'template-parts/content', 'social-button' ); ?>

		    		<a href="<?= get_site_url() ?>/articles" class="btn btn-violet btn-simple">
		    			<svg style="width: 20px; height: 18px; vertical-align: middle;" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" class=""></path></svg>
		    			<span>BACK TO ARTICLES</span>
		    		</a>
		    	</div>


		       
		    <?php endwhile ?>
		<?php endif ?>

		<section class="featured-articles">
			<div class="grid-container">
				<h2>articles</h2>
				<div class="grid-x grid-margin-x">
					<?php 
						$currentId = get_the_ID();
					    $query = new WP_Query( array(
					        'post_type' => 'post',
					        'post_status' => 'publish',
					        'posts_per_page' => 3,
					        'post__not_in' => array($currentId)
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
	</div>
</main>

<div class="d-none" id="share-buttons"></div>

<script>
	$(function(){

        $('.blog-share-btn a').click(function(e){
        	e.preventDefault();

        	var link = $(this).attr('href');

        	window.open(link,'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes,  width=650, height=450');
        });
	})
</script>

<?php get_footer() ?>