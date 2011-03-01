<?php

/**
 * Cogear — simple and fast site management system.
 *
 * Created by Dmitriy Belyaev at the year of 2011.
 *
 * "Life is like the development. But the last one never ends." — Dmitriy Belyaev
 */
// Version
define('COGEAR', '2.0');
// Constants
define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);
define('EXT', '.php');
define('ROOT', realpath(dirname(__FILE__)));
define('GEARS_FOLDER', 'gears');
// Core gears
define('ENGINE', ROOT . DS . 'engine');
// Gears for all sites
define('GEARS', ROOT . DS . 'gears');
define('SITES', ROOT . DS . 'sites');
define('LIBRARY', ROOT . DS . 'library');
define('DEFAULT_SITE', SITES . DS . 'default');
define('PHP_FILE_PREFIX', '<?php ' . "\n");
define('IGNITE', time());
// Define error reporting level
error_reporting(E_ALL | E_STRICT);

/**
 * Search for file — layerd pancake ideology
 *
 * @param string $file
 * @return string|array
 */
function find($file) {
    $paths = array(
        ENGINE . DS . $file,
        ENGINE . DS . 'Core' . DS . $file,
        GEARS . DS . $file,
    );
    defined('SITE') && $paths[] = SITE . DS . GEARS_FOLDER . DS . $file;
    while ($path = array_pop($paths)) {
        if (strpos($path, '*') && $result = glob($path)) {
            return $result;
        } elseif (file_exists($path)) {
            return $path;
        }
    }
    return FALSE;
}

/**
 * Simple debug
 *
 * @param   mixed   $data
 */
function debug() {
    echo '<pre>';
    $args = func_get_args();
    call_user_func_array('var_dump', $args);
    $last = array_pop($args);
    $last === TRUE && die();
}

$aliases = array();

/**
 * Create an alias for class
 *
 * @global array $aliases
 * @param string $from
 * @param string $to
 */
function alias($from, $to) {
    global $aliases;
    $aliases[$from] = $to;
}

/**
 * Autoload
 *
 * @param   $class  Class name.
 * @return  boolean
 */
function autoload($class) {
    global $aliases;
    isset($aliases[$class]) && $class = $aliases[$class];
    $file = str_replace('_', DS, $class) . EXT;
    static $loaded = array();
    if (isset($loaded[$class])) {
        return TRUE;
    } elseif ($path = find($file)) {
        include $path;
        $loaded[$class] = $path;
        return TRUE;
    }
    return FALSE;
}

// Register with autoload
spl_autoload_register('autoload');

$cogear = Cogear::getInstance();
// Some gears are needed to be preloaded
$cogear->request = new Request();
$cogear->config = new Config();
// Set host
$host = $cogear->request->get('HTTP_HOST');
// Defince site folder
// Check if main
if (substr_count($host, '.') > 1) {
    if (!is_dir(SITES . DS . $host)) {
        list($subdomain, $host) = preg_split('#[\.]+#', $host, 2, PREG_SPLIT_NO_EMPTY);
        define('SUBDOMAIN', $subdomain);
    }
}
defined('SITE') OR is_dir(SITES . DS . $host) && define('SITE', SITES . DS . $host) OR define('SITE', DEFAULT_SITE);
define('SITE_GEARS', SITE . DS . GEARS_FOLDER);
$cogear->config = new Config(SITE . DS . 'settings' . EXT);
define('DEVELOPMENT', $cogear->config->development);
$folder = basename(ROOT);
if (!in_array($folder, array('www', 'public_html', 'htdocs', SITE))) {
    define('SUBDIR', $folder);
    $host .= '/' . SUBDIR;
}
if (($port = $cogear->request->get('SERVER_PORT')) != 80) {
    $host .= ':' . $port;
}
define('SITE_URL', $host);
// Define uploads folder
defined('UPLOADS') OR define('UPLOADS', SITE . DS . 'uploads');
$cogear->system_cache = new Cache(array('adapter' => Cache::FILE, 'path' => SITE . DS . 'cache' . DS . 'system', 'enabled' => !DEVELOPMENT));
$cogear->cache = $cogear->config->cache ? new Cache($cogear->config->cache) : $cogear->system_cache;
if (!$options = $cogear->config->cookies) {
    $options = array(
        'name' => 'session',
        'cookie_domain' => '.' . SITE_URL,
    );
}
$cogear->router = new Router();
$cogear->assets = new Assets();
$cogear->response = new Response();
$cogear->session = Session::factory('session', $options);
// Load other gears

$cogear->loadGears();
$cogear->setTheme('Theme_960');
$cogear->event('ignite');
$cogear->event('done');
$cogear->response->send();
