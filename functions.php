<?php
/**
 * Mitra Netra functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 * @author Ibrahim Nurandita Isbandiputra
 * @package Mitra Netra
 */

if ( ! function_exists( 'badr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function badr_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Badr Interactive, use a find and replace
	 * to change 'badr' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'badr', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'badr' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'badr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
}
endif; // badr_setup
add_action( 'after_setup_theme', 'badr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function badr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'badr_content_width', 640 );
}
add_action( 'after_setup_theme', 'badr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function badr_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'badr' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
}
add_action( 'widgets_init', 'badr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function badr_scripts() {
	// wp_enqueue_style( 'badr-style', get_stylesheet_uri() );

	wp_enqueue_script( 'badr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'badr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'badr_scripts' );

// Coba Excerpt
// Changing excerpt length
function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Changing excerpt more
function new_excerpt_more($more) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Buat gravatar jadi circular 
add_filter('get_avatar','add_gravatar_class');
function add_gravatar_class($class) {
	$class = str_replace("avatar avatar-50", "avatar avatar-50 img-circle", $class);
	return $class;
}
//Add class di image works
add_filter('get_the_post_thumbnail','add_works_class');
function add_works_class($class) {
	$class = str_replace("attachment-300x300 wp-post-image", "attachment-300x300 wp-post-image img-responsive", $class);
	return $class;
}
// add new meta field di plugin projects
function new_projects_fields( $fields ) {
	$fields['platform'] = array(
		'name' 			=> __( 'Platform', 'projects' ),
		'description' 	=> __( 'Enter a platform used for this project.', 'projects' ),
		'type' 			=> 'text',
		'default' 		=> '',
		'section' 		=> 'info'
		);
	$fields['date'] = array(
		'name' 			=> __( 'Date', 'projects' ),
		'description' 	=> __( 'Enter a date used for this project.', 'projects' ),
		'type' 			=> 'text',
		'default' 		=> '',
		'section' 		=> 'info'
		);

	return $fields;
}
add_filter( 'projects_custom_fields', 'new_projects_fields' );


function addUploadMimes($mimes) {

	$mimes = array_merge($mimes, array(
		'epub|mobi' => 'application/octet-stream'
		));
	return $mimes;

}

add_filter('upload_mimes', 'addUploadMimes');

function get_currentuser_age(){
	global $current_user;
	$metadata = get_metadata('user',$current_user->ID);
	global $age;
	$age = date_diff(date_create($metadata['tanggal_lahir'][0]), date_create('today'))->y;
	return $age;
}
add_action( 'get_currentuser_age', 'get_currentuser_age' );
add_action( 'show_user_profile', 'add_other_user_info' );
add_action( 'edit_user_profile', 'add_other_user_info' );

function add_other_user_info( $user )
{
	?>
	<h3>Informasi Lainnya</h3>

	<table class="form-table">
		<tr>
			<th><label for="nomor_handphone">Nomor Handphone</label></th>
			<td><input type="text" name="nomor_handphone" value="<?php echo esc_attr(get_the_author_meta( 'nomor_handphone', $user->ID )); ?>" class="regular-text" /></td>
		</tr>

		<tr>
			<th><label for="jenis">Jenis Tuna Netra</label></th>
			<td><input type="text" name="jenis" value="<?php echo esc_attr(get_the_author_meta( 'jenis', $user->ID )); ?>" class="regular-text" /></td>
		</tr>

		<tr>
			<th><label for="jenis_kelamin">Jenis Kelamin</label></th>
			<td><input type="text" name="jenis_kelamin" value="<?php echo esc_attr(get_the_author_meta( 'jenis_kelamin', $user->ID )); ?>" class="regular-text" /></td>
		</tr>

		<tr>
			<th><label for="tanggal_lahir">Tanggal Lahir</label></th>
			<td><input type="text" name="tanggal_lahir" value="<?php echo esc_attr(get_the_author_meta( 'tanggal_lahir', $user->ID )); ?>" class="regular-text" /></td>
		</tr>

		<tr>
			<th><label for="alamat">Alamat</label></th>
			<td><input type="text" name="alamat" value="<?php echo esc_attr(get_the_author_meta( 'alamat', $user->ID )); ?>" class="regular-text" /></td>
		</tr>
	</table>
</br>
<h3>User Download Activity</h3>
<?php
function build_table($array){
			    // start table
	$html = '<table class="wp-list-table widefat fixed striped downloads">';
			    // header row
	$html .= '<tr>';
	foreach($array[0] as $key=>$value){
		$html .= '<th>' . $key . '</th>';
	}
	$html .= '</tr>';

			    // data rows
	foreach( $array as $key=>$value){
		$html .= '<tr>';
		foreach($value as $key2=>$value2){
			$html .= '<td>' . $value2 . '</td>';
		}
		$html .= '</tr>';
	}

			    // finish table and return it

	$html .= '</table>';
	return $html;
}
$data_results=getUserActivity();
echo build_table($data_results);
?>

<?php
}

add_action( 'personal_options_update', 'save_user_info' );
add_action( 'edit_user_profile_update', 'save_user_info' );

function save_user_info( $user_id )
{
	update_user_meta( $user_id,'nomor_handphone', sanitize_text_field( $_POST['nomor_handphone'] ) );
	update_user_meta( $user_id,'jenis', sanitize_text_field( $_POST['jenis'] ) );
	update_user_meta( $user_id,'jenis_kelamin', sanitize_text_field( $_POST['jenis_kelamin'] ) );
	update_user_meta( $user_id,'alamat', sanitize_text_field( $_POST['alamat'] ) );
	update_user_meta( $user_id,'tanggal_lahir', sanitize_text_field( $_POST['tanggal_lahir'] ) );
}

function my_login_logo() { ?>
<style type="text/css">
	#login h1 a, .login h1 a {
		background-image: url(<?php echo bloginfo('template_directory'); ?>/img/header/logo-mitranetra.png);
		height:60px;
	}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function example_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'statistik',         // Widget slug.
                 'Statistik',         // Title.
                 'showDashboardStatistic' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'example_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function showDashboardStatistic() {

	// Display whatever it is you want to show.
	?>
	<a href="https://mitranetra.web.id/wp-admin/admin.php?page=gf_export&view=export_form">Link untuk export Form Isian</a>
	<br>
	<a href="https://mitranetra.web.id/wp-admin/edit.php?post_type=sdm_downloads">Link untuk lihat daftar buku</a>
	<br>
	<a href="https://mitranetra.web.id/wp-admin/users.php">Link untuk lihat daftar pengguna (Silahkan klik salah satu pengguna untuk melihat detil aktivitas download nya)</a>
	<?php
}

function wpse127636_register_url($link){
    /*
        Change wp registration url
    */
        return str_replace(site_url('wp-login.php?action=register', 'login'),site_url('register', 'login'),$link);
    }
    add_filter('register','wpse127636_register_url');

    function wpse127636_fix_register_urls($url, $path, $orig_scheme){
    /*
        Site URL hack to overwrite register url     
        http://en.bainternet.info/2012/wordpress-easy-login-url-with-no-htaccess
    */
        if ($orig_scheme !== 'login')
        	return $url;

        if ($path == 'wp-login.php?action=register')
        	return site_url('register', 'login');

        return $url;
    }
    add_filter('site_url', 'wpse127636_fix_register_urls', 10, 3);

function register_buku_mitnet() {
    global $wp_post_types;
 
    $wp_post_types['sdm_downloads']->show_in_rest = true;
    $wp_post_types['sdm_downloads']->rest_base = 'sdm_downloads';
    $wp_post_types['sdm_downloads']->rest_controller_class = 'WP_REST_Posts_Controller';
}
add_action( 'init', 'register_buku_mitnet', 30 );

/**
 * Enables the Excerpt meta box in Page edit screen.
 */
function add_comment_for_sdm_downloads() {
	add_post_type_support( 'sdm_downloads', array( 'comments' ) );
}
add_action( 'init', 'add_comment_for_sdm_downloads' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Wordpress Popular Posts compatibility file. Konfigurasi untuk pluginnya
 */
require get_template_directory() . '/inc/popular-posts.php';

/**
 * Load Wordpress Breadcrumb compatibility file. Konfigurasi untuk pluginnya
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Load Konfigurasi slider di gravity form
 */
require get_template_directory() . '/inc/gravityform.php';
require get_template_directory() . '/inc/gravityform2.php';

// The object type. For custom post types, this is 'post';
// for custom comment types, this is 'comment'. For user meta,
// this is 'user'.
$object_type = 'post';
$args1 = array( // Validate and sanitize the meta value.
    // Note: currently (4.7) one of 'string', 'boolean', 'integer',
    // 'number' must be used as 'type'. The default is 'string'.
    'type'         => 'string',
    // Shown in the schema for the meta key.
    'description'  => 'A meta key associated with a string meta value.',
    // Return a single value of the type.
    'single'       => true,
    // Show in the WP REST API response. Default: false.
    'show_in_rest' => true,
);
register_meta( $object_type, 'my_meta_key', $args1 );

add_filter('show_admin_bar', '__return_false');