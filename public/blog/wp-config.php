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
define('DB_NAME', 'indiablog_wordpress');

/** MySQL database username */
define('DB_USER', 'indiabloguser');

/** MySQL database password */
define('DB_PASSWORD', 'aO*Yekjlvbh8ajoxcadjH');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         '#!*tRZKE[CNKF1kM!|AWWeBp=,4rZfKv]k/f#29Muo }kG/:G*Y!W+gVCl<JT6,z');
define('SECURE_AUTH_KEY',  'h|aZ{.RryMekFG5Zf&8|b5bSqa&tek$i&x4[X7+M1z8.2GBQHzpcG%?z>Fm$21rE');
define('LOGGED_IN_KEY',    'C<d/Zyv;;I0JIg|m2rDKi?OT;r[N<[{Z_TlkmuyzuVKwT-AOzr56IA8+=5yd&2Sx');
define('NONCE_KEY',        ', YXulQ|n^-(q<j~YEVnT%p}Z_C~Zw1P%hlp$1^A80#Rk`o#zjJ|I>bHJd/9O3(9');
define('AUTH_SALT',        'MUK:nuJmwVQ[N|AeVo^^pp3t;v=:ib{PjM4%5(n]@PfY^sIqvgru?bWAK+;&J~ta');
define('SECURE_AUTH_SALT', '-mg-LlEY074R[sZ:<-lj{&[Kb_^,:!ox0/%|z9B^2@JOjMix$Bf~s+:Gq<f*9X:+');
define('LOGGED_IN_SALT',   'VQ$D*-95W||Q7GKrLC[rmFF@|+|GxcSSx|-$E9*u;6Q-.^$<%-||x3{$vB8E+77>');
define('NONCE_SALT',       '9a<%Rrz*Z+m[B9.TL|T|xRp`}qZ:+fQ)QJw=eZt}z~!=0+3y1/p)KAP*F_{T2DW/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
