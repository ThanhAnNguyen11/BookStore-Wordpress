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
define('DB_NAME', 'bookstore');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '7IWWiU/Zk4qLg&( nj]U[4>7Lhx+{7VO,}&5LV0u8>Y)0BTrmfjD:n:P]n?lRg5:');
define('SECURE_AUTH_KEY',  'T#zfPuHfqNa,vaYk^gD1G.b2GBALW]-~&:,_5XK#a<Sj#^k>MS#t~m,eGVLgdX?|');
define('LOGGED_IN_KEY',    ':%+)~aICny(JXHM_099qXKQrP60[3~^Ylsp~us?NjR^N[&} 2o3h59BbYN+fnMHC');
define('NONCE_KEY',        'yqk%Bz6ud`Xb9XekwmwFN+pdQhDtU&J9h_;9w9=Cj>5izlVh 28(AL>-]L:<4qt:');
define('AUTH_SALT',        '3V7 F`49UCOzURC6ma?0Y5G)Ne5OKvP^E=Cgh#rv6 S:W&,U3#0,Ll4,X12h <Et');
define('SECURE_AUTH_SALT', 'LN[~1kvXDQG;sf%T[@x9{k?3 }X~J5OrPQ=LEGMU+$~]lHy6;: >r`tjUlV*^fLc');
define('LOGGED_IN_SALT',   'w7F8bXR5]C<OKJKLx$_y+eEtz$-_+ny~BbM@R!+ xbwNASk]5Gy_U5cfQ?eHB}iu');
define('NONCE_SALT',       '1O P^z5BW?~KPa:!e#aQP~eF,EcRg)G;g.v$on1YuISI{?dmkT7t0?zMQ#cWhR/o');

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
