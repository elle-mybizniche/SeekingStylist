<?php get_header() ?>


<main class="child-page blog-post">
	<div class="grid-container">
		<div class="blog-header d-flex align-items-center flex-wrap justify-content-between">
			<h1>Articles</h1>
			<div class="d-flex align-items-center flex-wrap category-filter">
				<span>Categories: </span>
				<div class="custom-select">
					<select name="" id="">
						<option value="">Category 1</option>
						<option value="">Category 2</option>
						<option value="">Category 3</option>
						<option value="">Category 4</option>
					</select>
				</div>
			</div>
		</div>
		<?php if(have_posts()): ?>
			<div class="articles">
				<?php while(have_posts()): the_post() ?>
					<article>
						<a href="<?= get_the_permalink(); ?>">
							<div class="article-thumb">
								<?= get_the_post_thumbnail(); ?>
							</div>

							<h2><?= get_the_title(); ?></h2>
							<p>
								<?php
									$excerpt = get_the_excerpt();
									 
									$excerpt = substr($excerpt, 0, 120);
									$result = substr($excerpt, 0, strrpos($excerpt, ' '));
									echo $result;
								?>
							</p>
						</a>
					</article>
			    <?php endwhile ?>
			</div>
		    
		<?php endif ?>
	</div>
</main>

<?php get_footer() ?>