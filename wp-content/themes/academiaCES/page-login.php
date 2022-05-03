<?php
/**
 * Template name: login CES
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package craed_duoc_uc
 */
global $pagenow;
	$user_login = sanitize_user( $_POST['username'] );
	$user_email = sanitize_user( $_POST['email']    );
	$user_nombre = sanitize_user( $_POST['nombre']    );
	$user_apellido = sanitize_user( $_POST['apellido']    );
	$user_nivel = sanitize_user( $_POST['nivel']    );
	$user_cel = sanitize_user( $_POST['cel']    );


	if($user_login =="" || $user_login == null  ){
        wp_redirect( 'http://dev.circulodeespecialistas.cl/user/me/edit/' ); 
	}
	$user_id = username_exists( $user_login );
	
	if ( ! $user_id && false == email_exists( $user_email ) ) {
		$random_password = wp_generate_password( $length = 12, $include_standard_special_chars = false );
		$user_id = wp_create_user( $user_login, $random_password, $user_email );        
	}
	
	$user = get_userdatabylogin($user_login);

	$user_id = $user->ID;

	$userdata = array(
		'ID'                    => $user_id,    //(int) User ID. If supplied, the user will be updated.
		'user_login'            => $user_login,   //(string) The user's login username.
		'user_nicename'         => $user_nombre,   //(string) The URL-friendly user name.
		'user_email'            => $user_email,   //(string) The user email address.
		'display_name'          => $user_nombre,   //(string) The user's display name. Default is the user's username.
		'nickname'              => $user_nombre,   //(string) The user's nickname. Default is the user's username.
		'first_name'            => $user_nombre,   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
		'last_name'             => $user_apellido   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
	);

	wp_update_user( $userdata ) ;

	update_user_meta( $user_id, 'user_cel', $user_cel );
	update_user_meta( $user_id, 'user_nivel', $user_nivel );

	wp_set_current_user($user_id, $user_login);

	wp_set_auth_cookie($user_id);

	do_action('wp_login', $user_login);

	?>
		<script>
		window.location = '<?php echo  get_home_url();  ?>';
		</script>