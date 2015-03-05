<?php

add_action( 'init', 'wsu_ga_remove_analytics' );
function wsu_ga_remove_analytics() {
	global $wsu_analytics;
	remove_action( 'wp_enqueue_scripts', array( $wsu_analytics, 'enqueue_scripts' ) );
	remove_action( 'admin_init', array( $wsu_analytics, 'display_settings' ) );
	remove_action( 'wp_footer', array( $wsu_analytics, 'global_tracker' ), 999 );
	remove_action( 'admin_footer', array( $wsu_analytics, 'global_tracker' ), 999 );
}


/**
 * set up the site vars in the dom
 */
add_action('wp_head','set_site_code');
function set_site_code() {
	?>
<script type='text/javascript'>
/* <![CDATA[ */
var wsu_analytics = {
"wsuglobal":
	{
		"ga_code":"UA-55791317-1",
		"campus":"none",
		"college":"none",
		"unit":"ucomm",
		"subunit":"none",
		"events":[]
	},
	"app":{
		"ga_code":false,
		"page_view_type":"Front End",
		"authenticated_user":"Authenticated",
		"is_editor":false,
		"events":[]
	},
	"site":{
		"ga_code":"UA-17815664-9",
		"events":[]
	}
};
/* ]]> */
</script>
<?php }


add_action( 'wp_enqueue_scripts', 'gauntlet_scripts' );
/**
 * Enqueue child theme Javascript files.
 */
function gauntlet_scripts() {
	wp_enqueue_script( 'jtrack.min.js', '//repo.wsu.edu/jtrack/develop/jtrack.min.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'default_events.js', get_stylesheet_directory_uri() . '/scripts/default_events.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'default_ui-events.js', get_stylesheet_directory_uri() . '/scripts/default_ui-events.js', array( 'jquery' ), false, true );	
	wp_enqueue_script( 'analytics.js', get_stylesheet_directory_uri() . '/scripts/analytics.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'site.js', get_stylesheet_directory_uri() . '/scripts/site.js', array( 'jquery' ), false, true );
}




// Add specific CSS class by filter
add_filter( 'body_class', 'icon_class_names' );
function icon_class_names( $classes ) {
	if(isset($_COOKIE['testIcon'])){
		$icon=rand(0,6);
		setcookie ("testIcon", $icon, time() - 3600);
	}else{
		$icon=$_COOKIE['testIcon'];
	}
	
	$icons = array(
		'block',
		'grow',
		'pulse',
		'color',
		'text',
		'animated',
		'arrow',
	);
	
	
	// add 'class-name' to the $classes array
	$classes[] = 'icon-test-'.$icons[$icon];
	// return the $classes array
	return $classes;
}

