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
 */
	get_header();
	$user_login = sanitize_user( $_GET['username'] );
	$user_email = sanitize_user( $_GET['email']    );

	echo $user_login;
	echo $user_email;

	$user_id = username_exists( $user_login );

	
	if ( ! $user_id && false == email_exists( $user_email ) ) {
		$random_password = wp_generate_password( $length = 12, $include_standard_special_chars = false );
		$user_id = wp_create_user( $user_login, $random_password, $user_email );
	}else{
		
		$user = get_userdatabylogin($user_login);	
		$user_id = $user->ID;
	}
/*
	wp_set_current_user($user_id, $user_login);

	wp_set_auth_cookie($user_id);

	do_action('wp_login', $user_login);
	// Automatic login //
	*/
	$user = get_user_by('login', $user_login );

	// Redirect URL //
	if ( !is_wp_error( $user ) )
	{
		wp_clear_auth_cookie();
		wp_set_current_user ( $user->ID );
		wp_set_auth_cookie  ( $user->ID );

		$redirect_to = get_home_url();
		wp_safe_redirect( $redirect_to );
		exit();
	}
		?>
