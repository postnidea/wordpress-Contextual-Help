<?php
/***
Plugin Name: Help Documentation
Plugin URI: http://abc.com
Description: Its the simple plugin that can help in help suport
Author URI: http://abc.com
**/

function postnidea_admin_actions() {
   add_menu_page('Hero module page title', 'Hero Module', 'manage_options', 'hero-module-page', 'my_magic_function');
   add_submenu_page( 'hero-module-page', 'Page title', 'Hero components', 'manage_options', 'my-submenu-handle', 'my_magic_function1');
}
 
add_action('admin_menu', 'postnidea_admin_actions');

function my_magic_function(){
	echo "Here work for hero module";
}

function my_magic_function1(){
	echo "Here work for hero module component";
}

function postnidea_contextual_help($contextual_help, $screen_id, $screen) {

	$screen = get_current_screen();
	//$screen->remove_help_tabs();
	$screen->add_help_tab( array(
		'id'       => 'my-plugin-default',
		'title'    => __( 'Default' ),
		'content'  => '<br>This is where I would provide tabbed help to the user on how everything in my admin panel works. Formatted HTML works fine in here too'
	));

	$screen->add_help_tab( array(
		'id'       => 'how-to-add',
		'title'    => __( 'How to add doc' ),
		'content'  => '<br>In this particular tab i will show you how to add the content for out plugin so that we can be put out the correct content at the level of the content'
	));
	//add more help tabs as needed with unique id's

	// Help sidebars are optional
	$screen->set_help_sidebar(
		'<p><strong>' . __( 'For more information:' ) . '</strong></p>' .
		'<p><a href="http://postnidea.com/" target="_blank">' . _( 'Visit Postnidea' ) . '</a></p>'
	);
}

if (isset($_GET['page']) && $_GET['page'] == 'hero-module-page') 
{
	add_action('contextual_help', 'postnidea_contextual_help', 10, 3);
}





?>
