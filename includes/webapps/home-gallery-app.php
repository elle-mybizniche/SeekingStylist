<?php require_once dirname(__FILE__) .  '\webapp-functions.php'; ?>

<div class="bordered border-pink border-content-offset-left">
	<div class="home-gallery">
		<?php 
			$query_ctr = 1;
		    $query = new WP_Query( array(
		        'post_type' => 'home-gallery-app',
		        'post_status' => 'publish',
		        'posts_per_page' => -1
		    ));
		    while ($query->have_posts()) : $query->the_post();
		?>
			<?php if ($query_ctr == 1): ?>
				<div class="slider-viewer">
					<?php $controlImage = get_field('hgf_image'); ?>
					<?= create_img_tag($controlImage) ?>
				</div>
			<?php endif ?>
			
		<?php $query_ctr++; endwhile;  ?>


		<?php if ($query_ctr != 1): ?>
			<div class="slider-thumb">
				<?php 
					$query_ctr = 1;
				    while ($query->have_posts()) : $query->the_post();
				?>
					<?php if ($query_ctr != 1): ?>
						<div class="slider-thumb-item">
							<?php $controlImage = get_field('hgf_image'); ?>
							<?= create_img_tag($controlImage) ?>
						</div>
					<?php endif ?>

				<?php $query_ctr++; endwhile; wp_reset_postdata(); ?>
			</div>
		<?php endif ?>
	</div>
</div>
