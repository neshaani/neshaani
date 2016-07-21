<?php

use \Slim\App as Slim;
use \Slim\Views\Twig as Twig;
use \Slim\Views\TwigExtension as TwigExtension;

ini_set('display_errors', $config['display_errors']);
date_default_timezone_set( $config['timezone'] );

$config = require __DIR__ . '/config.php';
require __DIR__ . '/../vendor/autoload.php';


$app = new Slim([
		'settings' => [
			'displayErrorDetails' => $config['displayErrorDetails'],
			'baseURL' => $config['baseURL'],
		]
]);

$container = $app->getContainer();

$container['view'] = function($container) {
	
	$view = new Twig(__DIR__ . '/../resources/views/', [
		'cache' => $config['cache'],
	]);

	$view->addExtension(new TwigExtension(
		$container->router,
		$container->request->getUri()
	));

	return $view;

};

require __DIR__ . '/database.php';
require __DIR__ . '/routes.php';