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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'c9v' );

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
define( 'AUTH_KEY',         'O601/k:]]l)@w,lF~Sc;)5WY%.VLZj@8P#:WHaAppt:T!Vldz>=UrN,l Z5x=gem' );
define( 'SECURE_AUTH_KEY',  'MVo?i`BdIKWPF@]=v-Ihs~B<1K[G5M~S|,TvHoePch0wdpE^~}X]y{B[L>yVISgH' );
define( 'LOGGED_IN_KEY',    '=.;v|sc-OrwUVD.<]V6e+8?|9T}9,,/mb~VDO7!-f/`xGMf[P0SI@E1w}^$B9L/r' );
define( 'NONCE_KEY',        '/qXFI},XLQGN{+_ch|fAL<7WBow@c0:EeC<(rMQ|^4kJ{STcwS/&CRnk[^Pr2ZH$' );
define( 'AUTH_SALT',        ',Rlm`Zb0R3aKH>l;>bacYp6Z73uk0}NbPxVKNm5o}.vc{GgBI5=C@hY1%_E}_q9K' );
define( 'SECURE_AUTH_SALT', ':d`O:Q9k!^<)t<^2CSU#DPzh84Cl~i{(mBaJ${J]TzP,gSzb@U -00g3766*|huH' );
define( 'LOGGED_IN_SALT',   '}7IK~P(m8k<hV[}wbPLp;wl?GZ?CzxVhl??_{O>*RK&wp _tL[S&l7w?7&J.h@78' );
define( 'NONCE_SALT',       '_So5=Z7#=rFw%yyWdc=;8`i-U#n-y4Mg.R-l$Sc]:>$}lUT+)$HSC7iORp>INq|~' );

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
