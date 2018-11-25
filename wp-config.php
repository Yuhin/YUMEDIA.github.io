<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/Applications/MAMP/htdocs/YMEDIA/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'YUMEDIA');
/** Имя пользователя MySQL */
define('DB_USER', 'root');
/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'root');
/** Имя сервера MySQL */
define('DB_HOST', 'localhost');
/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');
/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');
/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'vcqpY3sov~R3;c>|957?NZD5mKLok~A$q~)jmG- Mevfm9Y$)tDnI?/iY7;HyA|1');
define('SECURE_AUTH_KEY',  '|0QNJhnwL)w^S`S9b[|Q,K4z4ey`eQwHI#OB~@l<29`@.H}2ysaMPpkfuINm!wHz');
define('LOGGED_IN_KEY',    'DKnC,:5Eg^nx-`(g~Ocj=? UQN[oCkSBo_0K4zrQuIq7lSSr@<TkrG2>JNc)F=.8');
define('NONCE_KEY',        'uu4Z],_#4p)nRw#wb6l4e_-R4SB6#.}zr?BpO+>C%5X28|DA|C`&r-`2^%g#d1$a');
define('AUTH_SALT',        'QBfX>o~77A<L[#}Vut;hEXUmn3A,q3!28,HO}$T2UJhLHeE0)I_QhW)!y}Yv0[4v');
define('SECURE_AUTH_SALT', 't-OVG:Zxa}K&EO;05TQM6|3dN{A*4gCuAZ~pY{$CI_+D8n/:!U+s*RpUd/PeBT0q');
define('LOGGED_IN_SALT',   'eAgM-N@lFCb,28rgMuFDXu@%:3luV{[$=wJ!dR*B.lQDF?DQC:/V5/!*9C-40Ggf');
define('NONCE_SALT',       ')MAHNj!6nzYhXyME$p*N#e1WDvqCAJ}qohr xw@U2sg8!P0jB6:lP?q#52p{#,`e');
/**#@-*/
/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';
/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
/* Это всё, дальше не редактируем. Успехов! */
/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
