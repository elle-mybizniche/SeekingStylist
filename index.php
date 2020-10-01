<?php get_header() ?>


<main class="child-page blog-post">
	<div class="grid-container">
		<div class="blog-header d-flex align-items-center flex-wrap justify-content-between">
			<h1>Articles</h1>
			<div class="d-flex align-items-center flex-wrap category-filter">
				<span>Categories: </span>
				<div class="custom-select">
					<select name="blog-category" id="blog-category">
						<?php 
							$cc = get_queried_object();
							$blogCategory = get_categories(['hide_empty' => false]); 
						?>
						<option value="*" data-category="<?= get_site_url(); ?>/articles">All</option>
						<?php foreach ($blogCategory as $category): ?>
							<?php if (is_category()): ?>
								<option <?= $cc->term_id == $category->term_id ? 'selected' : ''; ?> value="<?= $category->name ?>" data-category="<?= get_term_link( $category->term_id ); ?>"><?= $category->name ?></option>
							<?php else: ?>
								<option value="<?= $category->name ?>" data-category="<?= get_term_link( $category->term_id ); ?>"><?= $category->name ?></option>
							<?php endif ?>
							
						<?php endforeach ?>
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


<script>
	$(function(){

		$('#blog-category').change(function(){
			var getURL = $(this).find('option:selected').data('category');

			location = getURL;
		});

		

	})
</script>

<?php get_footer() ?>