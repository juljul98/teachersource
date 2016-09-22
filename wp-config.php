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
define('DB_NAME', 'teachersource');

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
define('AUTH_KEY',         '}9#kMDU*.%j*rwAco}GW&R%loH#U#y:ZH>i:JuYMo#V.2;G/rDh59?rrIS+Pxgi2');
define('SECURE_AUTH_KEY',  'bW@c.nq)d275.PI7L!~j5uO_0uO:>)*|-9+S[hMErwD5gupPyF( ,rTa*4qVDG;}');
define('LOGGED_IN_KEY',    '(_4J%/En+R>iL^rt0Y$D22P!a )u@utu4oieC .jux))OX4Dy>3jCk<1No$khDuw');
define('NONCE_KEY',        '#0LyIkqwx?K/^FyYJZ+L>:#PSPbAAC97$44,q#}j))XxfK]:Krimg;@|Go@URDp[');
define('AUTH_SALT',        'J}&h@[~7cV3+kISBg*07R)m}]sthj(8*<K]?Q$F|?{NW&KYNPNw}@KlpM^+*:+SU');
define('SECURE_AUTH_SALT', 'M=<Wm?{IWm*FWPow|K=piM7;m.H)#ak&Y#Ryw:z:xPvM:ESfup-w{)8YAzL/u(/i');
define('LOGGED_IN_SALT',   '1S6Nq$cTtKlr5;*fE]^Iz2xPivX8eG)%GFQd>Kj@Ip(=fk299cN s9$B=S,mB`MB');
define('NONCE_SALT',       ':vEywF@2B3&[xnJ[Uz]}3p;>VH6RK_@L43};_aw)j]3~{0xY{U;_MF0No=;TzK(=');

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
