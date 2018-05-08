<?php
/**
 * Entry meta information for posts
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

	function foundationpress_entry_meta() {
		if(get_post_type($post->ID) == 'post'):
		/* translators: %1$s: current date, %2$s: current time */
		echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . get_the_time(get_option('date_format') ). '</time>';
		elseif(get_post_type($post->ID) == 'mtaller') :
			$ptypeobj = get_post_type_object(get_post_type());
			echo '<span class="post-type-label">' . $ptypeobj->labels->name . '</span>';
		endif;
	}

