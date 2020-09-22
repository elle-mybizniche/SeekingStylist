<?php
/* Template Name: Find a Stylists Template */
get_header(); 
?>

<div class="search-nav">
	<div class="grid-x grid-margin-x align-items-center">
		<div class="cell medium-7">
			<div class="control-flex flex-wrap align-items-center">
				<h1>FIND A STYLIST</h1>
				<div class="flex-child-grow">
					<form action="">
		                <div class="group-fields">
		                    <input type="text" placeholder="Search by Location or by Stylist’s Name">
		                    <button type="submit" class="btn btn-black">search</button>
		                </div>
		            </form>
				</div>
			</div>
		</div>
		<div class="cell medium-5">
			<ul class="control-flex justify-content-end">
				<li><a href="#">Current Location</a></li>
				<li><a href="#">Filter</a></li>
			</ul>
		</div>
	</div>
	
</div>
<main class="find-style-content">
	<div class="search-stage">
		<div class="google-map-viewer">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220448.6973088476!2d-97.89348526132726!3d30.307982708552224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8644b599a0cc032f%3A0x5d9b464bd469d57a!2sAustin%2C%20TX!5e0!3m2!1sen!2sus!4v1600744057240!5m2!1sen!2sus" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
		<div class="stylist-card">
			<?php 
			    $query = new WP_Query( array(
			        'post_type' => 'stylist-app',
			        'post_status' => 'publish',
			        'posts_per_page' => -1,
			        'orderby' => 'name',
			        'order' => 'ASC',
			    ));
			    while ($query->have_posts()) : $query->the_post();
			?>
				<div class="stylist-item">
					<div class="profile-thumb">
						<a href="<?php get_the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</div>
					<div class="profile-info">
						<div class=" control-flex flex-wrap justify-content-around">
							<h3><?php the_title(); ?></h3>
							<p><?php the_field('osf_location') ?></p>
						</div>
						<div class="ratings-review">
							<ul class="rate rate-<?= get_field('osf_rate') ?>">
								<?php for ($i = 1; $i <= 5; $i++) { ?>
									<?php $controlRate = (int) get_field('osf_rate'); ?>
									<li class="<?= $i <= $controlRate ? 'selected' : ''; ?>">
										<svg xmlns="http://www.w3.org/2000/svg"><path d="M16.33 6.243a.841.841 0 00-.726-.58l-4.577-.415-1.813-4.24a.843.843 0 00-1.55 0l-1.806 4.24-4.578.415a.844.844 0 00-.478 1.475l3.46 3.034-1.02 4.494a.841.841 0 001.253.911l3.948-2.36 3.946 2.36a.843.843 0 001.254-.911l-1.02-4.494 3.46-3.033a.843.843 0 00.247-.896zm0 0" stroke="#707070"/></svg>
									</li>
								<?php } ?>
							</ul>
							<a href="#">345 reviews</a>
						</div>
						
					</div>

					
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</main>


<?php wp_footer() ?>