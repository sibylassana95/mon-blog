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
define( 'AUTH_KEY',         '5VGk#cOP|aYAyxP%NhK)Z`LAA]bPuU~/u{It(hd* NOD6Z@D`4<XoA!>4L3E}}|&' );
define( 'SECURE_AUTH_KEY',  'TREF8aGf20?WFLg|DfRyd[.PVa]]H&J6syn?7mu0q]+zC~!9Cz:xQXH2#aEa-!m ' );
define( 'LOGGED_IN_KEY',    '6m-z<Y}b> mgBvp#Z.%.ep S}%Hy{054}bmrj&&>>|K~TmL=:SBbx}D%8.Iat;uu' );
define( 'NONCE_KEY',        'SmcRW3Q8DuplwVm=GAM3B;FViml%bosG-@9M]o%413C t>%J$d6ieBFP4-o;huOL' );
define( 'AUTH_SALT',        'NYHeURK>+lcxb|P=CQO4Q|<.Kw5LUe&2v#P]pX7eljIz6Qi}21p KOSwLd//G+o6' );
define( 'SECURE_AUTH_SALT', 'hJ+PH-<]hmDkP23.$=!2T(XZHt(kAmY>I2/K/gg$X]oN-~j> RO?Qan:9:@W^dgW' );
define( 'LOGGED_IN_SALT',   'PT1&8b%F$Y^j<1wdL;b_e8N@HG?U<[N30t;X`c%H?IGd8eV4I$2F|{g52ppG,.6b' );
define( 'NONCE_SALT',       '(8//B:R3vKXfM*:L?&op!k?C`oE0!Qh0!losrH}R1TP@]lQT>4g#o5,9/B3$v42B' );
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
