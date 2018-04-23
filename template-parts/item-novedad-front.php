<article class="item-novedad-front" <?php if($novedad_data['featured'] == true): ?> style="background-image:url(<?php echo $novedad_data['img'];?>);" <?php endif;?> >
    <a href="<?php echo $novedad_data['link'];?>">
    <div class="wrapimg">
        <img src="<?php echo $novedad_data['img']?>" alt="<?php echo $novedad_data['post_title'];?>">
    </div>

        <div class="item-text-wrap">
            <h1><?php echo $novedad_data['post_title'];?></h1>
             <span class="date-item"><?php echo $novedad_data['date'];?></span>
        </div>
    </a>
</article>