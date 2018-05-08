<article class="item-novedad-archive media-object">
    
    <div class="media-object-section">
        <a href="<?php echo $novedad_data['link'];?>">
        <img src="<?php echo $novedad_data['img']?>" alt="<?php echo $novedad_data['post_title'];?>"></a>
    </div>
    
        <div class="media-object-section">
            <span class="date-item"><?php echo $novedad_data['date'];?></span>
            <h3><a href="<?php echo $novedad_data['link'];?>"><?php echo $novedad_data['post_title'];?></a></h3>
            <div class="excerpt">
                <?php echo $novedad_data['post_excerpt'];?>
            </div>
        </div>

</article>