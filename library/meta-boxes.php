<?php
/**
* Custom Meta Boxes based on CMB2
* @package cmschild
*
*/
add_action( 'cmb2_init', 'cmb2_add_cms_eventos_metabox' );
function cmb2_add_cms_eventos_metabox() {

	$prefix = '_cmb_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'infoevento',
		'title'        => __( 'Información del Evento', 'cmschild' ),
		'object_types' => array( 'cms_agenda' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );

	$cmb->add_field( array(
		'name' => __( 'Fecha Inicio', 'cmschild' ),
		'id' => $prefix . 'fecha_inicio',
		'type' => 'text_date_timestamp'
	) );

    $cmb->add_field( array(
		'name' => __( 'Fecha Cierre', 'cmschild' ),
		'id' => $prefix . 'fecha_cierre',
		'type' => 'text_date_timestamp'
	) );

    $cmb->add_field( array(
		'name' => __( 'Hora Inicio', 'cmschild' ),
		'id' => $prefix . 'hora_inicio',
		'type' => 'text_time',
        'time_format' => 'G:i A'
	) );

    $cmb->add_field( array(
		'name' => __( 'Hora Cierre', 'cmschild' ),
		'id' => $prefix . 'hora_cierre',
		'type' => 'text_time',
        'time_format' => 'G:i A'
	) );


      $cmb->add_field( array(
        'name' => __('Lugar', 'cmschild'),
        'id' => $prefix . 'lugar',
        'type' => 'text'
    ));

}