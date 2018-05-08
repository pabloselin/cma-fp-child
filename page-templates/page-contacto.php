<?php
/*
Template Name: Contacto
*/

 get_header(); ?>

 <div class="main-wrap" role="main">

 <?php do_action( 'foundationpress_before_content' ); ?>
 <?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
            <?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>

        <address class="address-info">
            <p><i class="fa fa-map-marker"></i> <?php echo cms_get_option('address');?></p> 
            <p><a href="tel:<?php echo cms_get_option('fono');?>"><i class="fa fa-phone"></i> <?php echo cms_get_option('fono');?></a></p> 
            <p><a href="mailto:<?php echo cms_get_option('site_email');?>"><i class="fa fa-envelope-o"></i> <?php echo cms_get_option('site_email');?></a></p>
        </address>

        <div class="google-map-custom">
            <?php $mapGPS = cms_get_option('address_map');?>
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA8p0VQM3KUYp4LqadkDoiDruBmY4eZJ3Y&sensor=false"></script>
            
            <div id="gmap_canvas" style="height:300px;width:100%"></div>
            <script type="text/javascript">
                function init_map(){
                    // Options
                    var myOptions = {
                        zoom:15,
                        center:new google.maps.LatLng(<?php echo $mapGPS['latitude']; ?>,<?php echo $mapGPS['longitude']; ?>)
                    };
                    // Setting map using options
                    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                    // Setting marker to our GPS coordinates
                    marker = new google.maps.Marker({map: map,clickable: false,position: new google.maps.LatLng(<?php echo $mapGPS['latitude']; ?>,<?php echo $mapGPS['longitude']; ?>)});
                }
                // Initializes google map
                google.maps.event.addDomListener(window, 'load', init_map);
            </script>
        </div>

            

		</div>
		<footer>
			<?php
				wp_link_pages(
					array(
						'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
						'after'  => '</p></nav>',
					)
				);
			?>
			<p><?php the_tags(); ?></p>
		</footer>
	</article>
 <?php endwhile;?>

 <?php do_action( 'foundationpress_after_content' ); ?>
 <?php get_sidebar(); ?>

 </div>

 <?php get_footer();