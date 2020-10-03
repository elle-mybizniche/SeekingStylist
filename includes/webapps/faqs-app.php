<section class="faqs-section mt-5" id="faqLists">
	<div class="grid-container">
		<?php 
			$query = new WP_Query( array(
		        'post_type' => 'faq-app',
		        'post_status' => 'publish',
		        'posts_per_page' => -1
		    ));
		 ?>
		<div class="grid-x grid-margin-x">
			<div class="cell medium-4 control-sidebar position-relative">
				<div data-sticky-container>
					<nav class="sidebar-menu sticky" data-sticky data-anchor="faqLists"  data-margin-top="5" data-sticky-on="medium">
						<ul data-magellan>
							<?php while ($query->have_posts()) : $query->the_post(); ?>
								<li><a  href="#faq-<?= get_the_ID(); ?>" ><?php the_title(); ?></a></li>
							<?php endwhile; ?>
						</ul>
					</nav>
				</div>
			</div>
			<div class="cell medium-8 control-content">
				<?php while ($query->have_posts()) : $query->the_post(); ?>
					<div class="faq-item">
						<div id="faq-<?= get_the_ID(); ?>" data-magellan-target="faq-<?= get_the_ID(); ?>">
							<h3><?php the_title(); ?><span></span></h3>
							<div class="faq-answer"><?php the_content(); ?></div>
						</div>
						
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>