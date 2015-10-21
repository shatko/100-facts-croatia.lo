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
define('DB_NAME', '100-facts-croatia.lo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Zagreb2010');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'XwREBM=xo]>${PO219>-L*v9m#9stifQ)}8-tXNNV.)M<wC|F4_ Q(ivyY9JER*i');
define('SECURE_AUTH_KEY',  '=~c:y6+DUS2Dh_;g3k7>%QIV}SkbX5n)1jPr*fNHeFDgl>~:N(nITYF=n3wNJsAI');
define('LOGGED_IN_KEY',    ',FQIFW=Z%V@4:*A!(+E;-wJrz0Z`7YqBso=0*~q2ERNjOs774yk1Y5CIZR1+||hW');
define('NONCE_KEY',        'g:LuKLoPiFRX80Xjog%^YM.N^-4^+$YX0_<-47e7!Lz$t)/Oys*Z~Ll8.I=#!g;6');
define('AUTH_SALT',        'P+#K?Q@w9`mCq}DW0C~9c:Y9Y+T3]k>$(kN%=p(YOJw|OBGjp{mI2YJ[#Jd)VD4/');
define('SECURE_AUTH_SALT', '/S=0>,V9-N0uLY caGwue8$?*6@{FS;0C#ai@ypT!pB<={m5[|#{7+|^-+G-dmg0');
define('LOGGED_IN_SALT',   ']+{<M.jkb0B.b#cn D+taBvvCDBL9]UMOeE(q_6$-111M|B{cF)smuZJG{JCHL_r');
define('NONCE_SALT',       'f,_@IG;+k(XG1ZqZMP/vsP9Ny]Q#Lh/x}rtG`haL>N<2^>C&8W)R3c6e`43j}*jD');

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
