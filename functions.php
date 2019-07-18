<?php
/**
 * EXPIRED_N_FABULOUS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EXPIRED_N_FABULOUS
 */

if ( ! function_exists( 'fabulous_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fabulous_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on EXPIRED_N_FABULOUS, use a find and replace
		 * to change 'fabulous' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fabulous', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'fabulous' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fabulous_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fabulous_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fabulous_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fabulous_content_width', 640 );
}
add_action( 'after_setup_theme', 'fabulous_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fabulous_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fabulous' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fabulous' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fabulous_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fabulous_scripts() {
	wp_enqueue_style( 'fabulous-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fabulous-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'fabulous-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fabulous_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Site General Settings',
		'menu_title' 	=> 'Site Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false,
        'post_id' => 'settings',
        'update_button'		=> __('Update settings', 'acf'),
        'updated_message'		=> __('Settings updated', 'acf'),
	));
}

add_filter( 'excerpt_length', function(){
	return 56;
} );

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
'wpb_widget', 
 
// Widget name will appear in UI
__('Social links block', 'wpb_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Simple widget for displaying social links', 'wpb_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
?>
    <?php if(get_field('linksInst','settings') || get_field('linksFb','settings') || get_field('linksTw','settings') || get_field('linksSnap','settings') || get_field('linksYtu','settings')){?>
                <div class="socialLinks-widget">
                   <div class="socialLinks-widget__cont">
                        <ul class="socialLinks-widget__list">
                            <?php if(get_field('linksInst','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksInst','settings')?>" class="item"><i class="fab fa-instagram"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                            <?php if(get_field('linksFb','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksFb','settings')?>" class="item"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                            <?php if(get_field('linksTw','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksTw','settings')?>" class="item"><i class="fab fa-twitter"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                            
                            <?php if(get_field('linksSnap','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksSnap','settings')?>" class="item"><i class="fab fa-snapchat-ghost"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                            <?php if(get_field('linksYtu','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksYtu','settings')?>" class="item"><i class="fab fa-youtube"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                        </ul>
                   </div>
                   <?php } else{ echo ' '; }?>
                </div>
<?php   
    echo $args['after_widget'];
}
         

public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
    }
    else {
        $title = __( 'Title for social link widget', 'wpb_widget_domain' );
    }
// Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
    }
     

public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} 

function true_load_posts(){
 
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';
	$q = new WP_Query();
	// если посты есть
	if( $q->have_posts() ){
 
		// запускаем цикл
		while( $q->have_posts() ){
            $q->the_post();
 ?>
		 <div class="blog-posts__item">
            <div class="thumb" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>)">
         </div>
                            
        <div class="info">
            <div class="meta-content">
                by <span class="author"><?php the_author(); ?></span> | <span class="date"><?php echo get_the_date('F j, Y') ?></span> | <span class="comments"><?php comments_number('0 commetns', '1 comment', '% comments'); ?></span> 
             </div>
                 <a href="<?php the_permalink(); ?>" class="info__title">
                    <?php the_title();?>
                 </a>
                 <div class="info__desc">
                    <?php the_excerpt(); ?>
                 </div>
                     <a href="<?php the_permalink(); ?>" class="info__more">
                        read more
                     </a>
                 </div>
            </div>	        
 <?php
        }
    }
    wp_reset_postdata();
	die();
}
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');




function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'cat' => 3,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        ?>
            <div class="blog-posts__item">
                 <div class="thumb" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>)">
                  </div>
                            
                 <div class="info">
                     <div class="meta-content">
                        by <span class="author"><?php the_author(); ?></span> | <span class="date"><?php echo get_the_date('F j, Y') ?></span> | <span class="comments"><?php comments_number('0 commetns', '1 comment', '% comments'); ?></span> 
                     </div>
                      <a href="<?php the_permalink(); ?>" class="info__title">
                            <?php the_title();?>
                      </a>
                      <div class="info__desc">
                            <?php the_excerpt(); ?>
                      </div>
                          <a href="<?php the_permalink(); ?>" class="info__more">
                            read more
                          </a>
                    </div>
                </div>
        <?php

    endwhile;
    endif;
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

class Excerpt {

  public static $length = 55;

  public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100
    );

  public static function length($new_length = 55) {
    Excerpt::$length = $new_length;

    add_filter('excerpt_length', 'Excerpt::new_length', 999);

    Excerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(Excerpt::$types[Excerpt::$length]) )
      return Excerpt::$types[Excerpt::$length];
    else
      return Excerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// An alias to the class
function my_excerpt($length = 55) {
  Excerpt::length($length);
}
 
//add_action( 'wp_login_failed', 'my_front_end_login_fail' );
//function my_front_end_login_fail( $username ) {
//	$referrer = $_SERVER['HTTP_REFERER'];  // откуда пришел запрос
//
//	// Если есть referrer и это не страница wp-login.php
//	if( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
//		wp_redirect( add_query_arg('login', 'failed', $referrer ) );  // редиркетим и добавим параметр запроса ?login=failed
//		exit;
//	}
//}


function registration_form( $username, $password, $email) {
 
    echo '
    <form id="registerform" action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div class="form-group">
   
    <input placeholder="Your name or wanted nicename *" type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    </div>
    
    <div class="form-group">
    
    <input placeholder="Your e-mail address *" type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    </div>
     
    <div class="form-group">
    
    <input placeholder="Password *" type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    </div>
    
    <div class="form-group bet">
        <label><input name="termandcond" type="checkbox" value="' . ( isset( $_POST['termandcond'] ) ? $termandcond : 'Yes' ) . '">I accept Terms and Conditions</label>
        <p class="mc4wp-subscribe">
            <label>
                <input type="checkbox" name="mc4wp-subscribe" value="1"  checked/>
                Subscribe to our newsletter.	</label>
        </p>
        <button class="cst-btn" type="submit" name="submit">Register</button>
    </div>
    </form>
    ';
}

function registration_validation( $username, $password, $email){
    global $reg_errors;
    $reg_errors = new WP_Error;
    if ( empty( $username ) || empty( $password ) || empty( $email )) {
        $reg_errors->add('field', 'Required form field is missing');
    }
    if ( 4 > strlen( $username ) ) {
        $reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
    }
    if ( username_exists( $username ) ){
        $reg_errors->add('user_name', 'Sorry, that username already exists!');
    }
    if ( ! validate_username( $username ) ) {
        $reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
    }
    if ( !is_email( $email ) ) {
        $reg_errors->add( 'email_invalid', 'Email is not valid' );
    }
    if ( email_exists( $email ) ) {
        $reg_errors->add( 'email', 'Email Already in use' );
    }
    if ( is_wp_error( $reg_errors ) ) {
        
        foreach ( $reg_errors->get_error_messages() as $error ) {
            echo '<div class="error-block"><span class="error-title">ERRORS/ERROR:</span>';
            echo '<p class="error-item"> - '.$error.';<p/>';
            echo '</div>';
        }
        
    }
}

function complete_registration() {
    global $reg_errors, $username, $password, $email;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $email,
            'user_pass'     =>   $password
        );
        $user_id = wp_insert_user( $userdata );
        echo '<span class="cong">Registration complete 😃 <br> Confirm your email</span>';
        $code = sha1($user_id . time()); // сгенерим случайную строку
        $activation_link = home_url().'/fbtb-breakup-guide-activate/?key='.$code.'&user='.$user_id; // создадим ссылку на активацию, подразумевается что на странице с урлом /activate/
        add_user_meta( $user_id, 'has_to_be_activated', $code, true ); // теперь запишем эту случайную строку в мета поля юзера, если это поле не пустое - значит пользователь еще не активировался
        $txt = '<h3>Hello, '.$username.'</h3><p>To activate your user on the site '.home_url().' follow this link: <a href="'.$activation_link.'">'.$activation_link.'</a></p>'; // это текст письма
        add_filter( 'wp_mail_content_type', 'set_html_content_type' ); // включаем формат письма в хтмл
        wp_mail( $email, 'User activation.', $txt ); // отправляем письмо юзеру
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' ); // выключаем формат письма в хтмл
    }
    
}

function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $_POST['username'],
        $_POST['password'],
        $_POST['email']
        );
         
        // sanitize user form input
        global $username, $password, $email;
        $username   =   sanitize_user( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
        $email      =   sanitize_email( $_POST['email'] );
 
        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
        $username,
        $password,
        $email
        );
    }
 
    registration_form(
        $username,
        $password,
        $email
        );
}

add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}


function mysearchexclude($query) {
	if ($query->is_search) {
		$query->set('category__not_in', array(8));
	}
	return $query;
}
add_filter('pre_get_posts','mysearchexclude');

add_filter('the_content', 'kama_search_backlight');
add_filter('the_excerpt', 'kama_search_backlight');
add_filter('the_title', 'kama_search_backlight');
function kama_search_backlight( $text ){
	// ------------ Настройки -----------
	$styles = ['',
		'color: #fff; background: #262626;',
		'color: #fff; background: #262626;',
		'color: #fff; background: #262626;',
		'color: #fff; background: #262626;',
		'color: #fff; background: #262626;',
	];

	// только для страниц поиска...
	if ( ! is_search() ) return $text;

	$query_terms = get_query_var('search_terms');
	if( empty($query_terms) ) $query_terms = array(get_query_var('s'));
	if( empty($query_terms) ) return $text;

	$n = 0;
	foreach( $query_terms as $term ){
		$n++;

		$term = preg_quote( $term, '/' );
		$text = preg_replace_callback( "/$term/iu", function($match) use ($styles,$n){
			return '<span style="'. $styles[ $n ] .'">'. $match[0] .'</span>';
		}, $text );
	}

	return $text;
}


function dequeue_jquery_migrate( $scripts ) {
    if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff(
            $scripts->registered['jquery']->deps,
            [ 'jquery-migrate' ]
        );
    }
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );


add_shortcode( 'custom_passreset', 'render_pass_reset_form' );
function render_pass_reset_form() {

 
	$return = '';
 
	if ( isset( $_REQUEST['errno'] ) ) {
		$errors = explode( ',', $_REQUEST['errno'] );
 
		foreach ( $errors as $error ) {
			switch ( $error ) {
				case 'empty_username':
					$return .= '<div class="errno"><p>Please, enter your email!</p></div>';
					break;
				case 'password_reset_empty':
					$return .= '<div class="errno"><p>Please, enter your password!</p></div>';
					break;
				case 'password_reset_mismatch':
					$return .= '<div class="errno"><p>Passwords do not match!</p></div>';
					break;
				case 'invalid_email':
				case 'invalidcombo':
					$return .= '<div class="errno"><p>No user with the specified email address found on the site.</p></div>';
					break;
			}
		}
	}
 
	if ( isset( $_REQUEST['login'] ) && isset( $_REQUEST['key'] ) ) {
 
		$return .= '
			<form name="resetpassform" id="resetpassform" action="' . site_url( 'wp-login.php?action=resetpass' ) . '" method="post" autocomplete="off">
                <div class="caption-cont cnt">
                    <h2 class="simple-caption">
                        <span>Create new password</span>
                    </h2>
                </div>
				<input type="hidden" id="user_login" name="login" value="' . esc_attr( $_REQUEST['login'] ) . '" autocomplete="off" />
				<input type="hidden" name="key" value="' . esc_attr( $_REQUEST['key'] ) . '" />
                <p class="form-row">
					<input class="cst-in" type="password" name="pass1" id="pass1" class="input" size="20" value="" placeholder="enter new password" autocomplete="off" />
                    
                    <input class="cst-in" type="password" name="pass2" id="pass2" class="input" size="20" value="" placeholder="repeat the password" autocomplete="off" />
				</p>
					
 
				<p class="resetpass-submit">
					<input type="submit" name="submit" id="resetpass-button" class="cst-btn cst-btn__black" value="Reset" />
				</p>
			</form>';
 
		// возвращаем форму и выходим из функции
		return $return;
	}
 
	$return .= '
		<form id="lostpasswordform" action="' . wp_lostpassword_url() . '" method="post">
            <div class="caption-cont cnt two-line">
                        <h2 class="simple-caption">
                            <span>Request a</span>
                            <span>Password Reset</span>
                        </h2>
                    </div>
			<p class="form-row">
				<input class="cst-in" type="text" name="user_login" id="user_login" placeholder="Enter your username or email address ">
			</p>
 			<p class="lostpassword-submit">
				<input type="submit" name="submit" class="lostpassword-button cst-btn cst-btn__black" value="Request Password Reset" />
			</p>
		</form>';
 
	// возвращаем форму и выходим из функции
	return $return;
}


add_action( 'login_form_lostpassword', 'pass_reset_redir' );
 
function pass_reset_redir() {
	// если используете другой ярлык страницы сброса пароля, укажите здесь
	$forgot_pass_page_slug = '/fbtb-breakup-guide-reset';
	// если используете другой ярлык страницы входа, укажите здесь
	$login_page_slug = '/fbtb-breakup-guide';
	// если кто-то перешел на страницу сброса пароля
	// (!) именно перешел, а не отправил формой,
	// тогда перенаправляем на нашу кастомную страницу сброса пароля
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] && !is_user_logged_in() ) {
		wp_redirect( site_url( $forgot_pass_page_slug ) );
		exit;
	} else if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
    		// если же напротив, была отправлена форма
    		// юзаем retrieve_password()
    		// которая отправляет на почту ссылку сброса пароля
    		// пользователю, который указан в $_POST['user_login']
		$errors = retrieve_password();
		if ( is_wp_error( $errors ) ) {
            		// если возникли ошибки, возвращаем пользователя назад на форму
            		$to = site_url( $forgot_pass_page_slug );
            		$to = add_query_arg( 'errno', join( ',', $errors->get_error_codes() ), $to );
        	} else {
            		// если ошибок не было, перенаправляем на логин с сообщением об успехе
            		$to = site_url('/');
            		$to = add_query_arg( 'errno', 'confirm', $to );
        	}
 
		// собственно сам редирект
        	wp_redirect( $to );
        	exit;
	}
}
 
/*
 * Манипуляции уже после перехода по ссылке из письма
 */
add_action( 'login_form_rp', 'to_custom_password_reset' );
add_action( 'login_form_resetpass', 'to_custom_password_reset' );
 
function to_custom_password_reset(){
 
	$key = $_REQUEST['key'];
	$login = $_REQUEST['login'];
	// если используете другой ярлык страницы сброса пароля, укажите здесь
	$forgot_pass_page_slug = '/fbtb-breakup-guide-reset';
	// если используете другой ярлык страницы входа, укажите здесь
	$login_page_slug = '/fbtb-breakup-guide';
 
	// проверку соответствия ключа и логина проводим в обоих случаях
	if ( ( 'GET' == $_SERVER['REQUEST_METHOD'] || 'POST' == $_SERVER['REQUEST_METHOD'] )
		&& isset( $key ) && isset( $login ) ) {
 
		$user = check_password_reset_key( $key, $login );
 
		if ( ! $user || is_wp_error( $user ) ) {
			if ( $user && $user->get_error_code() === 'expired_key' ) {
				wp_redirect( site_url( $login_page_slug . '?errno=expiredkey' ) );
			} else {
				wp_redirect( site_url( $login_page_slug . '?errno=invalidkey' ) );
			}
			exit;
		}
 
	}
 
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
 
		$to = site_url( $forgot_pass_page_slug );
		$to = add_query_arg( 'login', esc_attr( $login ), $to );
		$to = add_query_arg( 'key', esc_attr( $key ), $to );
 
		wp_redirect( $to );
		exit;
 
	} elseif ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
 
		if ( isset( $_POST['pass1'] ) ) {
 
 			if ( $_POST['pass1'] != $_POST['pass2'] ) {
				// если пароли не совпадают
				$to = site_url( $forgot_pass_page_slug );
 
				$to = add_query_arg( 'key', esc_attr( $key ), $to );
				$to = add_query_arg( 'login', esc_attr( $login ), $to );
				$to = add_query_arg( 'errno', 'password_reset_mismatch', $to );
 
				wp_redirect( $to );
				exit;
			}
 
			if ( empty( $_POST['pass1'] ) ) {
				// если поле с паролем пустое
 				$to = site_url( $forgot_pass_page_slug );
 
				$to = add_query_arg( 'key', esc_attr( $key ), $to );
				$to = add_query_arg( 'login', esc_attr( $login ), $to );
				$to = add_query_arg( 'errno', 'password_reset_empty', $to );
 
				wp_redirect( $to );
				exit;
			}
 
			// тут кстати вы можете задать и свои проверки, например, чтобы длина пароля была 8 символов
			// с паролями всё окей, можно сбрасывать
			reset_password( $user, $_POST['pass1'] );
			wp_redirect( site_url( '/?errno=changed' ) );
 
		} else {
			// если что-то пошло не так
			echo "Oooopssss, something's wrong. Wait a few minutes and try again.";
		}
 
		exit;
 
	}
 
}
function set_html_content_type() {
	return 'text/html';
}
