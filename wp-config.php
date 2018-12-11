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
define('DB_NAME', 'romazzsz_aliro');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'sCQ2!+K,:Y72XfTw%67-OZB<^vd71<imc$)Oc61{B,hY}BqeP[n})p^4~(HXRESJ');
define('SECURE_AUTH_KEY',  '?WY8}I2>XcYn0m( kjePh-D+.[2p!M%8Xt2TO2z@ca6-n$q3|))4wr}YwjJ8}@Z5');
define('LOGGED_IN_KEY',    'Y OxBH5OBobk@e9o/Zl.#wo$StxW1AkU9PnR>SU%[Bnw:oI[=EQ({;%[zoA})`9R');
define('NONCE_KEY',        'iatQXjz>-<EH/xm~.&CZr]}D5kNBrseA0?=Bqa*6d f,-;OnG`cdJ0h4pe8Kp%;F');
define('AUTH_SALT',        'QPQ;}[`_67u3w za4!fR2++(Hr^if&b<v]))!mO#6<Efaa/>tpNSgR%S+@IrG(<>');
define('SECURE_AUTH_SALT', 'S*xP`Y=C$Nvo9</^/otsY<.NlucTMPDk=5MvOJhUy~w2r(`k]*NNc!:e$)0@ogw/');
define('LOGGED_IN_SALT',   '9-~q+p<BxzeK?9NUZYX]#fro[I})4`=F$w8_`FDYZP>v^?raa}}R9m?V{99bF?Az');
define('NONCE_SALT',       '~7IjNm22Q^ZvNxQ=nJPa,1)~9XUQ(URP2~pGMf{)Nm[Av^Jhh8Wz1U.*&#voer.<');

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
/*
define('FS_METHOD', 'direct');
*/

if(is_admin()) {
    add_filter('filesystem_method', create_function('$a', 'return "direct";' ));
    define( 'FS_CHMOD_DIR', 0751 );
}
