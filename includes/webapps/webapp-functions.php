<?php
	
	function create_img_tag($img, $cls = ''){

	    if (!is_array($img)) {
	        return 'please enter an array';
	    }

	    if ($img['type'] != 'image') {
	        return 'please enter an image array';
	    }
	    
	    $id = $img['id'];
	    $src = wp_get_attachment_image_src( $id, 'full' );
	    $srcset = wp_get_attachment_image_srcset( $id, 'full' );
	    $sizes = wp_get_attachment_image_sizes( $id, 'full' );
	    $alt = get_post_meta( $id, '_wp_attachment_image_alt', true);

	    return '<img class="'.$cls.'" src="'.esc_attr($src[0]).'" srcset="'.$srcset.'"  sizes="'.$sizes.'" alt="'.$alt.'" title="'.$alt.'" />';
	}