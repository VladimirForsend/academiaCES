<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'f0rs3nda_elearning' );

/** MySQL database username */
define( 'DB_USER', 'f0rs3nda_elearning' );

/** MySQL database password */
define( 'DB_PASSWORD', 'u{OQPSQYPd}W' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '<RCrE[IWXBpkFkPeIV^J>:!IKU[Y5 h!z{^.$J[&?lTp%c@vo<x)9*F5|vR&9K a' );
define( 'SECURE_AUTH_KEY',  ',-2~C3BQI>Tf$8+{r.*@Fh;R+~!-* .@ux4Gs N=hF<qOgF/Efjgr:u^Tc[QfLP/' );
define( 'LOGGED_IN_KEY',    'ClIY7pP4gF;%vISk(eA<,a=VFko_m!_QO XkiXOb8k%9pmXbjm&At!y.J>sMX.50' );
define( 'NONCE_KEY',        '=s{H>NapP;FeyYkcAJSwYU+oRw.|9}T9:bV)#NuSl&//$rdPd[:Pr!usRqH}Y>zX' );
define( 'AUTH_SALT',        '>lz.71/mUHlVu$SA/soVXt0NL&yty~_(v:?{5K>;4S2P:nOoYlXf@J :dw-0N%DQ' );
define( 'SECURE_AUTH_SALT', 'i1!&FHCLwl#P4f=3BwmtdM5TWL%!N-d_juqj[S% EQm=N+SBU(z!m9o%;V&BkrZz' );
define( 'LOGGED_IN_SALT',   '/=@W4A`!N*Ls:,u~Jg9X3%$BIQf|tm-WOxn3z z*t5@*Ps?ScidGi#x`,g@NV!Dn' );
define( 'NONCE_SALT',       '-@a|Pgm,BzfMCk`<n@CJ&dq[#E)u$]Yh|X/#Ggz#AB-,Iul7B.ox*gJ[/JUkMhtO' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
