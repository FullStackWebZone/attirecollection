<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define('DISALLOW_FILE_EDIT', true); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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
define('DB_NAME', 'dbs6093218');

/** Database username */
define('DB_USER', 'dbu2406404');

/** MySQL database password */
define('DB_PASSWORD', 'gocDtnyGAJuDIphhNuPp');

/** MySQL hostname */
define('DB_HOST', 'db5007393622.hosting-data.io');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_SITEURL', 'https://fworldmagazine.com/');
define('WP_HOME', 'https://fworldmagazine.com/');
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
define('AUTH_KEY',         '~nVR[/jV!2%MbvT@{ofL:C=?QRtE]8YzA3R h_Evfdg/z5M|A:^s?Fj}.TdC!(T:');
define('SECURE_AUTH_KEY',  'K>5%Jb=WtI|ho%*Ss=waY`p1H>*&)ma.ShWD>kqmS7:KnD7xV B[1Yq~@bzbB&J,');
define('LOGGED_IN_KEY',    ';I79m@q`UIO|8Yp(CAP]@1l.[#B)c]}_7Cc*2%gkHu_QBOi$HF{%QqsZl,`SHNB/');
define('NONCE_KEY',        'sb^1|D|Jdh(-A3!@A$ub8sjCD$3BUnq~2~dm*FQ*U??U2.g>JQO*D7JTf<vWilXr');
define('AUTH_SALT',        'tY-xg&s6^s7CS+<ND/|I1H;Y;]t@fEr}x<r`l:S?W&Z5~VQ4h|8TfH}[KyP-_U4z');
define('SECURE_AUTH_SALT', 'bLtKp=z^Q_5  r2NXccqb]@!<mA4@W:v8W:A)$%=w^&3!Ytg-jkcP J8fnkbvJB3');
define('LOGGED_IN_SALT',   '^|m/:^1s:0$_/ef1L/z(cN;3_9gvgV=j/;UO`u5v$jx,vR#PlRq_IRPeCe STM~U');
define('NONCE_SALT',       '7lXlY~L6L.LRZxOz/~R[|Pkm!jD&BIzjJbUgmRfa.X MDQ8cRArYkoK AWzUT52>');

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
define('WP_DEBUG', false);
define('CONCATENATE_SCRIPTS', false);
define('SCRIPT_DEBUG', true);
define('DISALLOW_FILE_EDIT', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
