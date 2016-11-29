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

//define('WP_HOME','http://dev.razsodisce.org');
//define('WP_SITEURL','http://dev.razsodisce.org');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'novinarsko_razsodisce');

/** MySQL database username */
define('DB_USER', 'sodnik');

/** MySQL database password */
define('DB_PASSWORD', 'etrztg8oh9p0jasdfasg');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uRauoO%OB18+}ZS!%?h:F0%j7-+X+;DJrV?aG]-~,SXs-%/WW6_j=d[FMqW(UF(-');
define('SECURE_AUTH_KEY',  '}sl<dcF>Kyv#om8FKYz/#&r}PF>|`wd|o$L! mUA1H!7BjSlCj4Jc|pU~sm7v@p{');
define('LOGGED_IN_KEY',    '+_Cdj&G=j-Y7#EZd$PCWm[C_oHM/Q4dZYO{ixwE++)TD6l3*n [+@j.7t1SuYe,!');
define('NONCE_KEY',        't8(&~DK+^dX|L>8Qop-%-mllo=LjrOd|?M@a:c0/|nS^Qj%8~*p7`Ow-)/ow3/xO');
define('AUTH_SALT',        '9(OT#ugpvhqV+)4rk.y`R3+iu{`;[:)X<*Q<8!_$-;NMgVi_}isKi71X36F>3ASQ');
define('SECURE_AUTH_SALT', 'fXf-+A%m[k #z0_ ,431L+x;+^${}03-0`Eb*(=l6:A BiS+/*e~y@8me-OG~H`n');
define('LOGGED_IN_SALT',   '(5kVqc~w.&-8>~Tjqm_v8z.(5fK3U*pph MQc1C|fP4*+Vh|NG9VgQ(){71}j$<e');
define('NONCE_SALT',       '2W+x]f8m~Uhj5V+:9#->|^NLB#w+RR,D`]T!U0SBcfe4[]Bg=vq(o$9|mL)p`Hza');

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

#define( 'WP_DEBUG', true );
#@ini_set( 'display_errors', 'On' );
#error_reporting(E_ALL);

