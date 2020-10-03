<div>
	<div class="stylists-lists">
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

			<div class="stylists-item">
				<div class="profile-thumb">
					<a href="<?= get_the_permalink(); ?>">
						<?= get_the_post_thumbnail(); ?>
					</a>
				</div>
				<div class="profile-info">
					<h3><?php the_title(); ?></h3>
					<p><?php the_field('osf_location_city') ?>, <?php the_field('osf_location_state') ?></p>
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
					<div class="skills">
						<span><?= implode(", ", get_field('osf_skills')) ?></span>
					</div>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>

	<div class="slick-control">
		<div class="grid-container">
			<div class="app-slick-controller">
				<div>
					<button type="button" class="btn-slick-prev">
						<svg xmlns="http://www.w3.org/2000/svg" style="width: 30px; height: 50px"><g><path d="M.792 22.892l22.1-22.1a2.722 2.722 0 013.842 0l1.627 1.627a2.72 2.72 0 010 3.842L9.803 24.819 28.381 43.4a2.723 2.723 0 010 3.842l-1.627 1.627a2.722 2.722 0 01-3.842 0L.792 26.747a2.741 2.741 0 010-3.855z"/></g></svg>
					</button>
				</div>
				<div>
					<a href="#">
						VIEW MORE 
						<svg xmlns="http://www.w3.org/2000/svg" style="width: 8px; height: 14px;"><g><g><path d="M7.757 6.257L1.722.217a.744.744 0 00-1.05 0l-.45.445a.743.743 0 000 1.05l5.072 5.072-5.078 5.078a.744.744 0 000 1.05l.445.445a.744.744 0 001.05 0l6.046-6.045a.749.749 0 000-1.054z" data-name="Path 30" fill="#d0668f"/></g></g></svg>
					</a>
				</div>
				<div>
					<button type="button" class="btn-slick-next">
						<svg xmlns="http://www.w3.org/2000/svg" style="width: 30px; height: 50px"><g><path d="M28.382 22.892L6.282.792a2.722 2.722 0 00-3.842 0L.814 2.42a2.72 2.72 0 000 3.842l18.557 18.557L.793 43.4a2.723 2.723 0 000 3.842l1.627 1.627a2.722 2.722 0 003.842 0l22.12-22.122a2.741 2.741 0 000-3.855z"/></g></svg>
					</button>
				</div>
			</div>
			
		</div>
		
	</div>
</div>


<script>

	function getSuperActive($target){
		var activeChild = 2;

		if (window.innerWidth < 1200 && window.innerWidth > 767) {
			activeChild = 1;
		}
		if (window.innerWidth < 767) {
			activeChild = 0
		}
		$target.find('.slick-super-active').removeClass('slick-super-active');
		$target.find('.slick-active:eq('+activeChild+')').addClass('slick-super-active');
	}
	$(function(){
		var $sl = $('.stylists-lists');

		$sl.slick({
			slidesToShow: 6,
  			slidesToScroll: 1,
  			arrows: false,
  			infinite :true,
  			focusOnSelect : false,
  			swipe: false,
  			responsive: [
			    {
			      breakpoint: 1200,
			      settings: {
			        slidesToShow: 5
			      }
			    },
			    {
			      breakpoint: 991,
			      settings: {
			        slidesToShow: 3
			      }
			    },
			    {
			      breakpoint: 767,
			      settings: {
			        slidesToShow: 1
			      }
			    }
			  ]
		});

		$('.btn-slick-next').click(function(){
			$sl.slick('slickNext');
		});

		$('.btn-slick-prev').click(function(){
			$sl.slick('slickPrev');
		});


		getSuperActive($sl);
		$sl.on('afterChange',function(){
			getSuperActive($sl);
		});


		
	});
</script>