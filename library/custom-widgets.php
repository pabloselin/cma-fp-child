<?php

// Register and load the widget
function eventos_load_widget() {
	register_widget( 'eventos_widget' );
}
add_action( 'widgets_init', 'eventos_load_widget' );

// Creating the widget 
class eventos_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

        // Base ID of your widget
        'evtcontent', 

        // Widget name will appear in UI
        __('Eventos', 'frontcontent_domain'), 

        // Widget description
        array( 'description' => __( 'Regula el orden del bloque de eventos para la página de inicio', 'frontcontent_domain' ), ) 
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
        include( get_stylesheet_directory() . '/template-parts/widgets/widget-eventos-portada.php');
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


// Register and load the widget
function novedades_load_widget() {
	register_widget( 'novedades_widget' );
}
add_action( 'widgets_init', 'novedades_load_widget' );

// Creating the widget 
class novedades_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

        // Base ID of your widget
        'newscontent', 

        // Widget name will appear in UI
        __('Novedades de portada', 'frontcontent_domain'), 

        // Widget description
        array( 'description' => __( 'Regula el orden del bloque de Novedades para página de inicio' ), ) 
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
        include( get_stylesheet_directory() . '/template-parts/widgets/widget-novedades-portada.php');
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

// Register and load the widget
function talleres_load_widget() {
	register_widget( 'talleres_widget' );
}
add_action( 'widgets_init', 'talleres_load_widget' );

// Creating the widget 
class talleres_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

        // Base ID of your widget
        'tallerescontent', 

        // Widget name will appear in UI
        __('Talleres de portada', 'frontcontent_domain'), 

        // Widget description
        array( 'description' => __( 'Regula el orden del bloque de Talleres para página de inicio' ), ) 
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
        include( get_stylesheet_directory() . '/template-parts/widgets/widget-talleres-portada.php');
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

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}

add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget 
class wpb_widget extends WP_Widget {

    function __construct() {
    parent::__construct(

    // Base ID of your widget
    'frontcontent', 

    // Widget name will appear in UI
    __('Contenidos de portada', 'frontcontent_domain'), 

    // Widget description
    array( 'description' => __( 'Contenidos destacados en portada que se pueden mostrar en el interior del sitio', 'frontcontent_domain' ), ) 
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
    include( get_stylesheet_directory() . '/template-parts/widgets/widget-novedades-sidebar.php');
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

// Register and load the widget
function agenda_load_widget() {
	register_widget( 'agenda_widget' );
}

add_action( 'widgets_init', 'agenda_load_widget' );

// Creating the widget 
class agenda_widget extends WP_Widget {

    function __construct() {
    parent::__construct(

    // Base ID of your widget
    'agendawidget', 

    // Widget name will appear in UI
    __('Agenda portada', 'agendawidget_domain'), 

    // Widget description
    array( 'description' => __( 'Contenidos de agenda en portada que se pueden mostrar en el interior del sitio', 'agendawidget_domain' ), ) 
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
    include( get_stylesheet_directory() . '/template-parts/widgets/widget-eventos-sidebar.php');
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
        $title = __( 'New title', 'agendawidget_domain' );
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
} // Class agendawidget ends here