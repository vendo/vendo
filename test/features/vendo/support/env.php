<?php 

// Init kohana
defined('APPPATH') ?: define('APPPATH', 'application/');
defined('MODPATH') ?: define('MODPATH', 'modules/');
defined('SYSPATH') ?: define('SYSPATH', 'system/');
defined('EXT')     ?: define('EXT', '.php');

require_once APPPATH.'bootstrap.php';

require_once 'Zend/Registry.php';
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';
require_once 'test/features/goutte.phar';

// Create WebClient behavior
$world->client = new \Goutte\Client;
$world->client->setServerParameters(array('HTTP_HOST' => 'vendo'));
$world->response = null;
$world->form = array();

// Helpful closures 
$world->visit = function($link) use($world) {
	$world->response = $world->client->request('GET', $link);
};