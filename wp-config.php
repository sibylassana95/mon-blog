<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress5' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'siby' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^rmLR* G;5C7.r/<HYSjNW@/Ge3SL#fYI:[kD[q{<H8g)F50`$@$p{lBx,aI$mKy' );
define( 'SECURE_AUTH_KEY',  '&pbeJGO Qi9z>E`d3wet>O>8pQa-2(jE*Eq>iKc~FkP]&$ RM@)}M+Eh9qP%VZtg' );
define( 'LOGGED_IN_KEY',    'C5z&.wbtJura]ZT0!2/HBg=n_radk~y+(wCLdr}J=}r#y@^AH<v9ap@y3cU jaBG' );
define( 'NONCE_KEY',        'X<nx`k|q7Z+Brp6`+{}bjLCQ6qtPCY;2_*o?H6C-$5TJ~XcXo#tE;9o&U{ .@y?B' );
define( 'AUTH_SALT',        'Cn$d{:MSl>hTBwmU$)+_b![Z:OvrqzyxQWmYOv8*FIn,!Wr.7sJOQd^-s&odK`cd' );
define( 'SECURE_AUTH_SALT', '4+]iMF[7H3,4]wrOT2/?D-YM+m gh.w(1atUuA-+R+u#7?>*s#V*>c&,`m^EJEB;' );
define( 'LOGGED_IN_SALT',   'J:9Z[Y6KH!n[$9*_/c8Nv?<rL#gL5Nv,]sldWAUIdjtMmqkcf^-ZH{=zdH!=0]L>' );
define( 'NONCE_SALT',       'jv;2{68gK`tB9Hr1}4CjA|N,-!hy4#?9)S~iL_xSoFIVl?MsV`=nd5TuxW1xb0cJ' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
define ('FS_METHOD' , 'direct' );
