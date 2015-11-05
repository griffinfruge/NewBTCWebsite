<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home1/bluwebz/public_html/griffin/customer/griffin/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
/** The name of the database for WordPress */
define('DB_NAME', 'bluwebz_wrdp1');

/** MySQL database username */
define('DB_USER', 'bluwebz_wrdp1');

/** MySQL database password */
define('DB_PASSWORD', 'Xm6xJA5PMyhL9w');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'xYjo\`OU5xBaqU-$dJW\`om-T~~_w:\`u-zdHIOx_Mvy<D?v\`zP1k8P(A=/(|$cI=Q9sfN-');
define('SECURE_AUTH_KEY',  '(>wlR~mR-8mEu<A50Flkg1ALd)y<9b1@D4<(/ZNlfzdrc4cyKNC<uF-Bxl4pBRmcfhuSjeK9@5Nq');
define('LOGGED_IN_KEY',    'hO4#fxv2@U~N0:)m/OEd9PY\`WYx#f$M:WlSd09l=TD\`I5ITingw8j>T?g:gGV)|=/HEM-r67b7=*Y?J9|p*\`');
define('NONCE_KEY',        ';;>59gp=VK(QvsNwb?LrnRVwOyr<N(n=^r5|0x>o<dMt#M<ajLy_Bl=FKMUz)P3WQR8U~<V');
define('AUTH_SALT',        '^_|:YiW0BmW9;ugFaaaPCOEKedLBC@Iv54FA!)SKx$@I(>P184bvf1FvD<XM*');
define('SECURE_AUTH_SALT', '>1*0Bub@~~((VKlZHq$Gx~F/p2HN_$mvv^p~)tmXu34Xsda(:TW=Q-U\`V$vfqWX0rS8RUW(@/ry;m~');
define('LOGGED_IN_SALT',   'VD7WRc48FpO|$_f?|iVZ9wyShU/MPTQF?YDo3kjoqbp5MdD;dk9nfG*$9LHiEAnlDE42RVxt2xxq');
define('NONCE_SALT',       ';#5OBcXK>;!M)Z:ZI48jqtrSuV>YLR(XI;I|;/~U/8fJcVATXXG\`aW~-gK#RF^cvqJ');


/**#@-*/
define('AUTOSAVE_INTERVAL', 600 );
define('WP_POST_REVISIONS', 1);
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
define( 'WP_AUTO_UPDATE_CORE', true );
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
