<?php
// Register and load the widget
function footer_load_widget() {
    register_widget( 'footer_widget' );
}
add_action( 'widgets_init', 'footer_load_widget' );

// Creating the widget 
class footer_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

        // Base ID of your widget
        'footercontent', 

        // Widget name will appear in UI
        __('Información del colegio para el Footer', 'frontcontent_domain'), 

        // Widget description
        array( 'description' => __( 'Regula el orden del bloque de footer para página de inicio' ), ) 
        );
    }

    // Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
        ob_start();
        include( STYLESHEETPATH . '/template-parts/widgets/widget-footer-info.php');
        $aside = ob_get_clean();
        echo $aside;

        echo $args['after_widget'];
    }
            
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
        }
        else {
        $title = __( 'New title', 'frontcontent_domain' );
        }

        // Widget admin form
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php 
    }
        
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class frontcontent ends here