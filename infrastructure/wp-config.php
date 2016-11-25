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
define('DB_NAME', '50_bits_cms_db');

/** MySQL database username */
define('DB_USER', '50_bits_cms_db');

/** MySQL database password */
define('DB_PASSWORD', 'ry}C1&S1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('DISALLOW_FILE_EDIT', true);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         '8sawncL3Ha]t::Rc3b3H-G=((<S+ic<-V<+ti*>GPc:l`bDR[isM`VHU>wC`W`CE');
 define('SECURE_AUTH_KEY',  '8k8Gqs* ^#ZklZZO[yQyJ17sv>p95? WEm{[4r j+e%(!O@nm@bOyL3:QFKO9{^t');
 define('LOGGED_IN_KEY',    ':e _8QbZ5l5eg3%hP5<r=sI^R%Kh_T1?|s;61uF*+O,jZ|#}@r^Ts.<oz.%[z@hM');
 define('NONCE_KEY',        '+72+#=)`-e`fT2L7uQB re!-gUX2qC/b|^7|BBBn8]ks2rTxrz2?j5on(Ei;X0#t');
 define('AUTH_SALT',        'ay#u!C{0Ou _~OeDxh:ba8Ov%+R4Y[K(j7H2ith!=tH@lD76~vfr;,RK=z8t|tl(');
 define('SECURE_AUTH_SALT', 'HP8BW#HtNK?V%H/wPKN=.0@U*F|9RZB)@v^)3x[U{UsvP6zNw@:s^0<1D8VFcl7E');
 define('LOGGED_IN_SALT',   ' xlLGfy rsg5RzqY.s}[D|@N(MNZWSb#i`GC@=XU!+fA-tB?7J6d18= %2HeoCEf');
 define('NONCE_SALT',       'yibNAb o:K<+,&|8vc`pmQR;#X.m+JT*v9!-T0!3BX@9hxR*2VW3h?3#t+C^E9wm');

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
