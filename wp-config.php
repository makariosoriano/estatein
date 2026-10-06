<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'estatein' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'Lbh_rZ`2kzQ/|~e22/Q$Zq:Y YzE:>n|UVpTSw?}9>]Sey=I@HlkdLZDhz1YSV.=' );
define( 'SECURE_AUTH_KEY',  'F0Z@zmBtv,&)$qTd*/xMhrNz.HQ>l&5`@=xw,XgI0^9qD3PG51bVCae)4/P7uN-,' );
define( 'LOGGED_IN_KEY',    '1Xd7@MZ,tbc9pD@h.|}#hpg5=L1%}k:}T@r4d}@}16iu)e+_NNWf9OMvCg>I_Ug3' );
define( 'NONCE_KEY',        'YF:+-c4Q{3_@95}_:vD{aBuFp!dVsZQ#4[50AkWUOkK!E,uXc_8|lg{OTIxO[OFB' );
define( 'AUTH_SALT',        '~QBynTho/ui/E8|k04d7:)CR))U4]%_Ln+Gnq|.;CKmeKD_J:98=a{uQUR&QHn+Y' );
define( 'SECURE_AUTH_SALT', 'VB}9R~zwZ!a*?V&H}r<q`Ys4thsaJuXYY+WBI<C%udPX7ST1yKFx<-I.I4DDi^IZ' );
define( 'LOGGED_IN_SALT',   'A>h?q#J^7/uQ?a;!n4$$68&4@PkgyCTu?S}?Em<d4ns XZe7*BeK-*[D2t+$l yy' );
define( 'NONCE_SALT',       'tTRy&?#@AT?1MO@Fs1pe+R XNfBr&WXnu$/Z`Wveu^Wj,YX2BB@|Xc&fN-[p|o|I' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
