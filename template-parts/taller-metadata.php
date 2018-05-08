<div class="taller-metadata metadata-box callout">
    <?php 
    $iteminfo = get_query_var('iteminfo');
    $custom_fields = $iteminfo['fields'];
    $taxs = $iteminfo['taxterms'];
    $cursos = $taxs['talleres_cursos'];
    $areas = $taxs['talleres_areas'];
    $days = get_the_terms( $post->ID, 'talleres_dias' );
    //xdebug_break();
    ?>

    <p><strong><i class="fa fa-fw fa-user-circle"></i> Profesor:</strong> <?php echo $custom_fields['_mt_profesor'][0];?></p>
    <p><strong><i class="fa fa-fw fa-map-marker"></i> Lugar:</strong> <?php echo $custom_fields['_mt_lugar'][0];?></p>
    
    <?php if($custom_fields['_mt_cupos'][0]):?>
        <p><strong><i class="fa fa-fw fa-list-alt"></i> Cupos:</strong> <?php echo $custom_fields['_mt_cupos'][0];?></p>
    <?php endif;?>

    <p><strong><i class="fa fa-fw fa-clock-o"></i> Horario(s)</strong>
    <?php foreach($days as $day):
        $count = count($days) > 1 ? 'multiple' : 'single';
        if($custom_fields['_mt_horario' . $day->slug]):?>

        <span class="horario-unit <?php echo $count;?>"><i class="fa fa-calendar fa-fw"></i> <strong><?php echo $day->name;?>:</strong> <?php echo $custom_fields['_mt_horario' . $day->slug][0];?> - <?php echo $custom_fields['_mt_horario_termino' . $day->slug][0];?></span>

        <?php 
        endif;
        ?>
    <?php endforeach;?>
    </p>

    <?php if($areas):?>
    
    <p><i class="fa fa-circle fa-fw"></i> <strong>Áreas:</strong> <?php echo implode(', ', $areas);?></p>
    
    <?php endif;?>

     <?php if($tipos):?>
    
    <p><i class="fa fa-square-o fa-fw"></i> <strong>Tipos:</strong> <?php echo implode(', ', $tipos);?></p>
    
    <?php endif;?>

    <?php if($cursos):?>
        <p><i class="fa fa-pencil-square-o fa-fw"></i> <strong>Cursos: </strong>
        <?php foreach($cursos as $curso):
        ?>

        <span class="warning label"><?php echo $curso;?></span>

        <?php
        endforeach;
        ?>
        </p>
    <?php endif;?>
</div>