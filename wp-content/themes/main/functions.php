<?

function my_enqueue_assets() {
	wp_enqueue_script('main-js-main', get_template_directory_uri() . '/../main/js/main.js');
}
add_action('wp_enqueue_scripts', 'my_enqueue_assets');

add_action("admin_bar_menu", function($wp_admin_bar) {
	if (current_user_can("manage_options")) {
		$wp_admin_bar->add_menu([
			'id'     	=> 'show_ip',
			'parent' 	=> null,
			'group'  	=> null,
			'title'  	=> $_SERVER["SERVER_ADDR"],
		]);
	}
}, 999, 1); // low priority so it is executed almost at the end, ensuring this action takes the last decision

function hook_qeue_scripts() {
    wp_enqueue_script('web-components', '/wp-content/themes/main/web-components/dist/web-components.js', true );
}
add_action('wp_enqueue_scripts', 'hook_qeue_scripts');

?>
