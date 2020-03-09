<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Khalid' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3J/LSOZIa-W5MVmi[k3 zj&q;xhfNu[#{xfVl}[M|=-cS)wtrBqC)LA#xTU$_wUT' );
define( 'SECURE_AUTH_KEY',  'mE&jW:qnqJb.$`70_V)Q~ln?G]:.@ltRlxCQ3u$.S Y#Xp=vx@Whc;WY%`$`CQfR' );
define( 'LOGGED_IN_KEY',    ':em_qimM89(%6PG27[:)(z;&`Ki]wYloug|Apu;sp&rqV9XM~V^.b6w3$|)$K0f(' );
define( 'NONCE_KEY',        'C/;7Jp/zc}iQjt=sO&p/E4t8$L}$A$[JIs%Y}d@c<LEN>/i#}$elI:7G$!VjI([7' );
define( 'AUTH_SALT',        '>&D,ixkofahJlT}jm.Zy4DMrA%`osLS@fL`C.X.sX8-le-s@s0M(a.Z]/6D[NMUf' );
define( 'SECURE_AUTH_SALT', 'TJAU<C~Ppz??7H[BCUIMg$A_I.T-*5iZ{l;$>xm;TTi)B5v}kkpL=e>N)/J.ou6V' );
define( 'LOGGED_IN_SALT',   'Q?=-j4ygM#8zWo]0ZXN|/g5= 6cnCroG8pW)o3}e?-}T`|CxPDz+#)tf~%WP;itX' );
define( 'NONCE_SALT',       'sH+*jT|/xxrbY#~sU_0[Zgl%n;~F1jsv&re0~e3YZ*Xbzw{f/.1v}w@eb6I,U4&Q' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

