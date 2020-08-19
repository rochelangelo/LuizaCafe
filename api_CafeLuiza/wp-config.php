<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'cafeluiza' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'q)RHR_d>c]-7{u(YwAs4In&eiaS%/@kT4DZv8+(HO8Lg*WELN{&^Wlr&5ljK!z^|' );
define( 'SECURE_AUTH_KEY',  '?n(GE<G1[eWpH~7d,k]^)7kr6=fr/F[UNHJ%hqp?:G>sNZQC>fsAt<qZb(l^<I9[' );
define( 'LOGGED_IN_KEY',    '6 Q<`b%FukvKcT)NZd0HK+/d}Oh`|aI<5c[l!(QEUE$}nK1]KR/r8mT8&k^e-vh#' );
define( 'NONCE_KEY',        'kXX&:h-6GfDa_HP#}uqqkU2m|4Y_u$EYH#MA4vzs1`o.y7(}Q-i^U ?&PpCNkOX5' );
define( 'AUTH_SALT',        '8V9w5cOl~cKjO@s8w/Em]4RW}GF+!jbpQ(!iBY!FA55#UTr#E/u<$0AbYg6doOGw' );
define( 'SECURE_AUTH_SALT', 'Zc[I:hl:9_g;7a}-OxJ{An{I5N{*e8GT.|Y`6hWLU(.qTM@-wN8Gp7(G4TWmGlT`' );
define( 'LOGGED_IN_SALT',   's(%+P(;4D$6~qj52j75g0mV;^4%pgIZ4ry_<@{6s=!i0@yb]3cTgtK,RD(e7wo$k' );
define( 'NONCE_SALT',       ' 0cYCEoZDs1G6;)dn_Qe>>m4GKf g,7AS5r*^E!Z@7|7{`:I}5K4exhoZk%2wz;X' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
