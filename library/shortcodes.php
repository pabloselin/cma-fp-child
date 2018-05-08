<?php

function talleres_shortcode($atts) {
  if(function_exists('talleres_mainboxcontent')) {
  	return talleres_mainboxcontent();
  }
}

add_shortcode( 'listado_talleres', 'talleres_shortcode' );