<div class="widget-footer-info">
	<h3><?php bloginfo('name');?></h3>
	<p><i class="fa fa-map-marker"></i> <?php echo cm_get_option('address');?> - <img src="<?php echo get_bloginfo('stylesheet_directory');?>/dist/assets/images/metro.svg" alt="Metro" width="24" height="12"> Metro Manquehue</p>
	<p><a href="tel:<?php echo cm_get_option('fono');?>"><i class="fa fa-phone"></i> <?php echo cm_get_option('fono');?></a></p>
	<p><a href="mailto:<?php echo cm_get_option('site_email');?>"><i class="fa fa-envelope-o"></i> <?php echo cm_get_option('site_email');?></a></p>
</div>