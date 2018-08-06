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
define('DB_NAME', 'wpx');

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
define('AUTH_KEY',         '#05kmhR?W^4I.k6kK=/_mP#Y6dt]_hq*y;w`omM^$Xl5c?RCwZ=7`|2?w,,r7os*');
define('SECURE_AUTH_KEY',  'Vn.;9;89*5j{D=B`6|uFGr<Aquu~KO919>ku%w09]J6twzuNUs&ho:d-kqg-He18');
define('LOGGED_IN_KEY',    'I(+8w2d^`s9Y2eQ-~VgfG*DG=>-;pRs2|PdRLA$`*BxKR`VB&&NM( MLJOTV-DxP');
define('NONCE_KEY',        'EMH#?I64A^*NzP~(8J=&/ pz-7heF|7y#GT^QDF8uAVD?KR^bfFr5pqlO<H5CzAJ');
define('AUTH_SALT',        '6c!ln2qJI: fx}Xi$),H3v@/>y{-`f]rJ:GnWTcwE`5srU}Jz@bu-Ws5>84k1BTW');
define('SECURE_AUTH_SALT', '/.plz`$(KNSPEcb5O#] z*Y3%KNbn(g]!a10=&@mu@RA<]}GXST,YDRIxm2lW? -');
define('LOGGED_IN_SALT',   'L{|3@5*3(Siq!k.&Iu(9ibI@/hcDfE(;)R_iVzDUjYbWdz?fC0;^hGsNh5Cn}u_T');
define('NONCE_SALT',       ',gu5BUpGF7}uDJwE2[A`*8erx 4I4w}i#yxkW!js++KLw<[^.2*v3Z&L#F#mq,c:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpx_min_';

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
