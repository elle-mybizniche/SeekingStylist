<?php
/* Template Name: Home Page */
get_header(); 
?>


<main class="home-content">
	<div class="grid-container">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>
			    
			<?php endwhile; ?>
		
	</div>
</main>


<?php get_footer() ?>