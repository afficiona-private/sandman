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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sandman' );

/** MySQL database username */
define( 'DB_USER', 'afficiona' );

/** MySQL database password */
define( 'DB_PASSWORD', 'asdfghjkl' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '|/Q6Xf`Vuj&wX/GIL/vF+oS4J,[;y@3{>3w+z-qm(k+r)$>gQ<.d4(<K0G/I/pbf');
define('SECURE_AUTH_KEY',  '>@9/(/FdP+EtTz:)%)>Qk!Q+N[6HU|A:t3AT(, 8emt>l819Y!~e}?I8+*|4>CMC');
define('LOGGED_IN_KEY',    'k-hh.I8UWe~QUg>tmrt1~QZ{4l>sEx1lTc+2!MlQ=o|LoTcUkG:5YulU#J;&Cn?N');
define('NONCE_KEY',        's?Qlb=2xpVs>+X?`Z.H+]A{-Zbr<aUd]-$YXm+_yer4< g5iG]pt_NIp8jeDN*+R');
define('AUTH_SALT',        'g)>*..84ud+$bnXUSP}O~HCD+;LSTb,|QN-pQMWn#u]:MB5+hb+:r1s2lYl{*FhP');
define('SECURE_AUTH_SALT', '$jYO]|L)R5m%V-LLH8Dct_9!*KF72TO*J!!No l*O2l(h}gKuHI6[>V7,L2s5!EA');
define('LOGGED_IN_SALT',   'rOXowT$LH+!K6@,,h|4d-+4HI@EbU!rsSM;a|y(T@hlMM`-*WPlg08}2T(Q}aU;W');
define('NONCE_SALT',       '/CHIQlct;w(l<k8LSg_vO1JTqwEc#VdS`,Z6^Z?EX4fo9&5BbB+Lu>.+[-lRWaAj');

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
