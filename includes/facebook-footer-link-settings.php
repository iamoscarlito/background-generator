<?php
//die('settings_page');

//Create menu link in back end of WP Settings

function ffl_options_menu_link(){
	add_options_page( //check the WP Doc on add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
		'Facebook Footer Link Options',
		'Facebook Footer Link',
		'manage_options',
		'ffl-options',
		'ffl_options_content' // this is the content that gets passed to the function
	);
}

// function my_plugin_menu() {
// 	add_options_page( 
// 		'My Options',
// 		'My Plugin',
// 		'manage_options',
// 		'my-plugin.php',
// 		'my_plugin_page'
// 	);
// }

// add_action( 'admin_menu', 'my_plugin_menu' );

function ffl_options_content(){

	//init options global
	global $ffl_options;
	//echo 'TEST';
	//use output buffer to display the a lot more content
	ob_start(); ?>
	<!-- Anything we put here will be displayed in regular html an output in the front end -->
	<!-- This is a test!-->
	<div class="wrap">
		<!--  use _e to localized it for US if the user wants to use other language use _e() // ffl_domain is the text domain -->
		<h2><?php _e('Facebook Footer Link Settings', 'ffl_domain'); ?></h2>
		<p><?php _e('Settings for the Facebook Footer Link Plugin', 'ffl_domain'); ?></p>
		<!-- Create form here -->
		<form method="post" action="options.php">
			<?php settings_fields('ffl_settings_group'); ?>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<!--ffl_options['enable'] will be set as a global in inte facebook-footer-link -->
								<!--we the value of checked equals to 1 so we used  checked('1',$ffl_options['enable'] -->
								<label for="ffl_settings[enable]"><?php _e('Enable', 'ffl_domain'); ?></label>
								<td><input type="checkbox" name="ffl_settings[enable]" id ="ffl_settings[enable]" value="1" <?php checked('1',$ffl_options['enable']) ?>>
								</td>
							</th>
						</tr>	
							<tr>
							<th scope="row">
								<label for="ffl_settings[facebook_url]"><?php _e('Facebook Profile URL', 'ffl_domain'); ?></label>
								<td><input type="text" name="ffl_settings[facebook_url]" id ="ffl_settings[facebook_url]" value="<?php echo $ffl_options['facebook_url']; ?>" class="regular-text">
									<p class="description"><?php _e('Enter your Facebook URL', 'ffl_domain'); ?></p>
								</td>
							</th>
						</tr>
							<tr>
							<th scope="row">
								<label for="ffl_settings[link_color]"><?php _e('Link Color', 'ffl_domain'); ?></label>
								<td><input type="text" name="ffl_settings[link_color]" id ="ffl_settings[link_color]" value="<?php echo $ffl_options['link_color']; ?>" class="regular-text">
									<p class="description"><?php _e('Enter your color or Hex value with a # sign', 'ffl_domain'); ?></p>
								</td>
							</th>
						</tr>
					</tbody>
				</table>
		</form>
	</div>

	<?php
	
	echo ob_get_clean();
}

add_action( 'admin_menu', 'ffl_options_menu_link');

//REGISTER SETTINGS
function ffl_register_settings(){
	register_setting('ffl_settings_group','ffl_settings'); //register_settings( string $option_group, string $option_name, array $args = array() )
}

add_action('admin_init', 'ffl_register_settings');