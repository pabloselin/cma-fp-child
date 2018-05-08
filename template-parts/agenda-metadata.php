<div class="agenda-metadata metadata-box">
    <?php 
    $iteminfo = get_query_var('iteminfo');
    $custom_fields = $iteminfo['fields'];
    $taxs = $iteminfo['taxterms'];
    ?>

    <p><i class="fa fa-calendar"></i> <?php echo date_i18n('l d \d\e F', $custom_fields['_cmb_fecha_inicio']);?>
    
    <?php if($custom_fields['_cmb_hora_inicio']):
        echo ' <i class="fa fa-clock-o"></i> ' . $custom_fields['_cmb_hora_inicio'];
    endif;?>

    </p>
    
    <?php if($custom_fields['_cmb_fecha_cierre'] || $custom_fields['_cmb_hora_cierre']):?>
        <p><strong>Cierre:</strong> <?php echo date_i18n('l d \d\e F', $custom_fields['_cmb_fecha_cierre']);?>
        
        <?php if($custom_fields['_cmb_hora_cierre']):
            echo ' <i class="fa fa-clock-o"></i> ' . $custom_fields['_cmb_hora_cierre'];
        endif;?>

        </p>
    <?php endif;?>

    <?php if($custom_fields['_cmb_lugar']):?>
        <p><i class="fa fa-map-marker"></i> <?php echo $custom_fields['_cmb_lugar'];?></p>
    <?php endif;?>

</div>