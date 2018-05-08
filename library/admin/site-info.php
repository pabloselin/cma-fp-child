<?php
/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class cm_Admin {

	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	protected $key = 'cm_options';

	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	protected $metabox_id = 'cm_option_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Holds an instance of the object
	 *
	 * @var cms_Admin
	 */
	protected static $instance = null;

	/**
	 * Returns the running object
	 *
	 * @return cms_Admin
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->hooks();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	protected function __construct() {
		// Set our title
		$this->title = __( 'Opciones del sitio', 'cm' );
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );

		// Include CMB CSS in the head to avoid FOUC
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		// hook in our save notices
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );

		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );

		// Set our CMB2 fields
		// 
		$cmb->add_field( array(
			'name' => 'Logo',
			'desc' => 'Logotipo del colegio (en formato SVG)',
			'id'   => 'logo',
			'type' => 'file'
		) );

		$cmb->add_field( array(
			'name' => 'Teléfono / Whatsapp',
			'desc' => 'Ej: +56 9',
			'id'   => 'fono',
			'type' => 'text',
			'default' => '+56',
		) );

        $cmb->add_field( array(
			'name' => 'Facebook',
			'desc' => 'URL de Página de Facebook',
			'id'   => 'fbpage',
			'type' => 'text',
			'default' => 'http://',
		) );

		$cmb->add_field( array(
			'name' => 'Youtube',
			'desc' => 'URL de canal de Youtube',
			'id'   => 'youtube_channel',
			'type' => 'text',
			'default' => 'http://',
		) );

        $cmb->add_field( array(
			'name' => 'E-Mail',
			'desc' => 'Correo electrónico de contacto',
			'id'   => 'site_email',
			'type' => 'text',
			'default' => '',
		) );

		 $cmb->add_field( array(
			'name' => 'Dirección',
			'desc' => 'Dirección',
			'id'   => 'address',
			'type' => 'text',
			'default' => '',
		) );

		$cmb->add_field( array(
			'name' => 'Mapa',
			'desc' => 'Dirección Mapa',
			'id'   => 'address_map',
			'type' => 'pw_map',
			'default' => '',
		) );

		$cmb->add_field( array(
			'name' => 'Talleres',
			'desc' => 'Información Talleres',
			'id' => 'title_talleres',
			'type' => 'title',
		) );

		$cmb->add_field( array(
			'name' => 'Página de Talleres',
			'id' => 'cm_selectpagetalleres',
			'desc' => 'Seleccione una página para el archivo de talleres',
			'show_option_none' => true,
			'type' => 'select',
			'options' => cm_makeselectpages()
		) );

	}

	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key
	 * @param  array $updated   Array of updated fields
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}

		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'cms' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the cms_Admin object
 * @since  0.1.0
 * @return cms_Admin object
 */
function cm_admin() {
	return cm_Admin::get_instance();
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function cm_get_option( $key = '', $default = null ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( cm_admin()->key, $key, $default );
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( cm_admin()->key, $key, $default );

	$val = $default;

	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}

	return $val;
}

function cm_makeselectpages() {
	$args = array(
		'post_type' => 'page',
		'numberposts' => -1,
	);
	$pages = get_posts($args);
	$pagearr = array();
	foreach($pages as $page) {
		$pagearr[$page->ID] = $page->post_title;
	}
	return $pagearr;
}

// Get it started
cm_admin();