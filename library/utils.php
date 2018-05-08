<?php 

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return strip_tags(implode(' ', $words));
}

function cms_preparecontent($postid, $title, $imgsize = 'thumbnail', $featured = false) {
        $novedad = get_post($postid);
				$type = get_post_type($novedad->ID);
				$typeobj = get_post_type_object( $type );
				$date = get_the_time( get_option('date_format'), $novedad->ID );
				if(has_post_thumbnail( $novedad->ID )):
							$srcid = get_post_thumbnail_id( $novedad->ID );
							$src = wp_get_attachment_image_src( $srcid, $imgsize );
				endif;
				$novedad_data = array(
								'id'				 	=> $novedad->ID,
								'date'					=> $date,
								'post_title' 			=> $title,
								'post_excerpt' 			=> $novedad->post_excerpt,
								'type' 					=> $typeobj->labels->name,
								'img' 					=> $src[0],
								'link'					=> get_permalink($novedad->ID),
								'featured'				=> $featured
							);
        return $novedad_data;
}