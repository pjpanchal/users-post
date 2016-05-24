<?php
/*
Plugin Name: Users Posts
Plugin URI: https://pankajbca.wordpress.com/
Description: An example plugin to demonstrate the basics of putting together a plugin in WordPress
Version: 0.1
Author: Pankaj Panchal
Author URI: https://pankajbca.wordpress.com/
License: GPL2
*/
?>
<?php
	function add_theme_scripts() {
	 wp_enqueue_style( 'custom_wp_css',  plugins_url( '/css/users.css', __FILE__ ) );
	 wp_enqueue_script( 'test', plugins_url( '/js/test.js', __FILE__ ), array('jquery'), '1.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

	
	/* Users drop down */
    add_shortcode( 'users-post', 'display_user_post_type' );
    function display_user_post_type()
	{
		$args = array(
		//'exclude' => array(1),
	);

	$users = get_users( $args );

	// now make your users dropdown
	if ($users) { ?>
	<form action="#" method="get" >
		<select name="user_dropdown" id="author">
			<option value="" disabled="disabled" selected>Choose User</option>
			<?php foreach ($users as $user) {
				echo '<option value="' .$user->ID .'">' .$user->user_nicename .'</option>';
			} ?>
		</select>
		<input type="hidden" id="dir_url" value="<?php echo plugins_url(); ?>">
	</form>
	<div id="txtHint"></br><hr></div>
		<?php
	}
	}
?>
