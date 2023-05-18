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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'iadhyzjq_wp574' );

/** Database username */
define( 'DB_USER', 'iadhyzjq_wp574' );

/** Database password */
define( 'DB_PASSWORD', '-X5)S..C2r1-pa30Kf.@' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'sl422ml6kr6d2ykvhdd6bybwg0gyopuo7k4tapa1eh2w3jdtmqwexwq11vtz4mt9' );
define( 'SECURE_AUTH_KEY',  'ldcre7vskd5aiqlltaqnbbxtddjlrwppd8ogqoajurxlvxorxxizjfgexecsqnxq' );
define( 'LOGGED_IN_KEY',    'zadwxcsam7pd4wukwwapgba6obncvoa77q7wv6ucifmlujd8jv9gsc0ievpfeobt' );
define( 'NONCE_KEY',        'zaqv0xxnrlxhkg1gmh3bmpfkpon0h0mfr2ovemabqskvkrd0getmpngwxv0n1ppl' );
define( 'AUTH_SALT',        'dnltfjgavwa7l7pvfqagtgqrt4supp8mp8apfxw15mmsxrx8bjcffak7qcnvi7uh' );
define( 'SECURE_AUTH_SALT', '3mcvfu9r2ccnwiwu4kwesysrbmjodr2fym3w9ew0fvufs5mfj6livqp9tjadjlys' );
define( 'LOGGED_IN_SALT',   'rbtege4xtlrq4agzfpgmvuqrcedbgjxufcpvbiumntmq8qaaoruut3qtcow3qm9g' );
define( 'NONCE_SALT',       'nuttn92fre1u71vnl9k7tzoxgbycm9zcb9mcqy4ocksirig5j5t02y6yz7bmcxkh' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpq9_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
