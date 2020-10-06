<?php
/* Template Name: Find a Stylists */
get_header(); 
?>
<div class="search-nav">
	<div class="grid-x grid-margin-x align-items-center">
		<div class="cell large-7 medium-12">
			<div class="d-flex flex-wrap align-items-center">
				<h1>FIND A STYLIST</h1>
				<div class="flex-child-grow">
					<form action="<?= get_site_url(); ?>/find-a-stylists/" id="searchStylist">
		                <div class="group-fields">
		                    <input type="text" name="search" id="search" value="<?= isset($_GET['search'] ) ? $_GET['search'] : '' ?>" placeholder="Search by Location or by Stylist’s Name">
		                    <button type="submit" class="btn btn-black text-uppercase">search</button>
		                </div>
		            </form>
				</div>
			</div>
		</div>
		<div class="cell large-5 medium-12">
			<ul class="d-flex justify-content-lg-end justify-content-center filter-nav">
				<li>
					<a href="javascript:;" id="btn-current-location" class="d-flex flex-wrap align-items-center">
						<svg xmlns="http://www.w3.org/2000/svg" id="current_location" width="32.973" height="32.973" fill="#fff"><path id="Path_56" d="M156.7 149.988a6.295 6.295 0 104.466 1.844 6.295 6.295 0 00-4.466-1.844zm3.5 9.812a4.974 4.974 0 111.446-3.507 4.924 4.924 0 01-1.446 3.507zm0 0" class="cls-1" transform="translate(-140.21 -139.812)"/><path id="Path_57" d="M32.294 15.808h-1.9A13.9 13.9 0 0017.165 2.582V.678a.678.678 0 10-1.357 0v1.9a13.9 13.9 0 00-13.226 13.23H.678a.678.678 0 100 1.357h1.9a13.9 13.9 0 0013.23 13.226v1.9a.678.678 0 101.357 0v-1.9a13.9 13.9 0 0013.226-13.226h1.9a.678.678 0 100-1.357zm-6.919 9.567a12.47 12.47 0 01-8.21 3.656V26.11a.678.678 0 00-1.357 0v2.921A12.543 12.543 0 013.941 17.165h2.922a.678.678 0 100-1.357H3.941A12.543 12.543 0 0115.808 3.941v2.922a.678.678 0 001.357 0V3.941a12.543 12.543 0 0111.867 11.867H26.11a.678.678 0 000 1.357h2.921a12.47 12.47 0 01-3.656 8.21zm0 0" class="cls-1"/></svg>
						<span class="pl-2">Current Location</span>
					</a>
				</li>
				<li>
					<a href="#" class="d-flex flex-wrap align-items-center">
						<svg xmlns="http://www.w3.org/2000/svg" id="filter_icn" width="19.391" height="27.467" fill="#fff"><path id="Path_58" d="M4.04 8.08a4.04 4.04 0 114.04-4.04 4.044 4.044 0 01-4.04 4.04zm0-6.868A2.828 2.828 0 106.868 4.04 2.831 2.831 0 004.04 1.212zm0 0" class="cls-1"/><path id="Path_63" d="M4.04 8.08a4.04 4.04 0 114.04-4.04 4.044 4.044 0 01-4.04 4.04zm0-6.868A2.828 2.828 0 106.868 4.04 2.831 2.831 0 004.04 1.212zm0 0" class="cls-1" transform="translate(0 19.387)"/><path id="Path_59" d="M174.809 42.18h-9.9a.606.606 0 010-1.212h9.9a1.212 1.212 0 100-2.424h-10.148a.606.606 0 010-1.212h10.148a2.424 2.424 0 110 4.848zm0 0" class="cls-1" transform="translate(-157.841 -35.918)"/><path id="Path_62" d="M174.809 42.18h-9.9a.606.606 0 010-1.212h9.9a1.212 1.212 0 100-2.424h-10.148a.606.606 0 010-1.212h10.148a2.424 2.424 0 110 4.848zm0 0" class="cls-1" transform="translate(-157.841 -16.531)"/><path id="Path_60" d="M302.708 264.08a4.04 4.04 0 114.04-4.04 4.044 4.044 0 01-4.04 4.04zm0-6.868a2.828 2.828 0 102.828 2.828 2.831 2.831 0 00-2.828-2.828zm0 0" class="cls-1" transform="translate(-287.356 -246.304)"/><path id="Path_61" d="M12.321 298.18h-9.9a2.424 2.424 0 110-4.848h10.151a.606.606 0 010 1.212H2.424a1.212 1.212 0 100 2.424h9.9a.606.606 0 010 1.212zm0 0" class="cls-1" transform="translate(0 -282.223)"/></svg>
						<span class="pl-2">Filter</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	
</div>

<?php 
	$meta_query = [];
	if (isset($_GET['search'])) {
		$meta_query = $_GET['search'];
	}

	$query = new WP_Query( array(
	    'post_type' 	=> 'stylist-app',
	    'post_status'	 => 'publish',
	    'posts_per_page' => -1,
	    'orderby' 		=> 'name',
	    'order' 		=> 'ASC',
	    's'	=> $meta_query
	));

 ?>
<main class="find-style-content">
	<div class="search-stage">
		<div class="google-map-viewer">
			<div id="map_canvas"></div>
			<div class="number-of-results d-flex align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="18.307" height="26.334" fill="#000"><path d="M9.15 0A9.164 9.164 0 000 9.154c0 6.344 9.163 17.18 9.163 17.18s9.145-11.149 9.145-17.18A9.164 9.164 0 009.15 0zm2.765 11.834a3.906 3.906 0 110-5.523 3.894 3.894 0 010 5.523zm0 0"/></svg>
				<span> <?= $query->found_posts; ?> Stylist Found</span>
			</div>
		</div>
		<div class="stylist-card">
			<?php 
			    
			    while ($query->have_posts()) : $query->the_post();
			?>
				<div class="stylist-item">
					<div class="d-none control-address">
						<?= implode(" ", get_field('osf_location')); ?>
					</div>
					<div class="control-thumb">
						<div class="profile-thumb">
							<a href="<?= get_the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
					</div>
					
					<div class="control-profile">
						<div class="profile-info">
							<div class="d-flex flex-wrap justify-content-between align-items-center">
								<h3 class="mb-0">
									<a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<p><?php the_field('osf_location_city') ?>, <?php the_field('osf_location_state') ?></p>
							</div>
							<div class="ratings-review flex-wrap">
								<ul class="rate rate-<?= get_field('osf_rate') ?>">
									<?php for ($i = 1; $i <= 5; $i++) : ?>
										<?php $controlRate = (int) get_field('osf_rate'); ?>
										<li class="<?= $i <= $controlRate ? 'selected' : ''; ?>">
											<svg xmlns="http://www.w3.org/2000/svg"><path d="M16.33 6.243a.841.841 0 00-.726-.58l-4.577-.415-1.813-4.24a.843.843 0 00-1.55 0l-1.806 4.24-4.578.415a.844.844 0 00-.478 1.475l3.46 3.034-1.02 4.494a.841.841 0 001.253.911l3.948-2.36 3.946 2.36a.843.843 0 001.254-.911l-1.02-4.494 3.46-3.033a.843.843 0 00.247-.896zm0 0" stroke="#707070"/></svg>
										</li>
									<?php endfor; ?>
								</ul>
								<a href="#">345 reviews</a>
							</div>
						</div>
					</div>
					<div class="control-skills">
						<div class="skills">
							<span><?= implode(", ", get_field('osf_skills')) ?></span>
						</div>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</main>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDac2mOtJr_IktjUhiLZYRL_xHzxRbodRE&v=3.11&sensor=false" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script type="text/javascript">

	var googleMap;
	var geocoder = new google.maps.Geocoder();
	var fn = {

		searchStylistInit : function($query){

		},

		initGoogleMapMarker : function($address, $idx){

			geocoder.geocode( { 'address': $address,  }, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {

					var marker = new google.maps.Marker({
	                    position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
	                    map: googleMap,
	                    title: 'Click Me ' + $address
	                });


	                (function (marker, idx) {
	                    google.maps.event.addListener(marker, 'click', function () {
	                        infowindow = new google.maps.InfoWindow({
	                            content: 'Hello, World!!'
	                        });
	                        infowindow.open(googleMap, marker);
	                    });
	                })(marker, $idx);
			    } 
			}); 
		},

		initGoogleMapCenter : function($address){
			geocoder.geocode( { 'address': $address,  }, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					var position = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
				    googleMap.setCenter(position);
				}
			});
		}
	}

    $(document).ready(function () {
        (function () {
            var options = {
                zoom: 17,
                center: new google.maps.LatLng(30.2746698,-97.7425392),
                mapTypeId: google.maps.MapTypeId.TERRAIN,
                mapTypeControl: false
            };

            googleMap = new google.maps.Map(document.getElementById('map_canvas'), options);


            $('.stylist-card .stylist-item').each(function(idx, itm){

            	var address = $(this).find('.control-address').text().trim();

            	if (idx == 0) {
            		fn.initGoogleMapCenter(address);
            	}

            	fn.initGoogleMapMarker(address, idx);

            });

            


            $('#btn-current-location').click(function(){
            	navigator.geolocation.getCurrentPosition(function(position) {
				  	var position = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
				    googleMap.setCenter(position);
				});
            });








        })();
    });
</script>


<?php wp_footer() ?>