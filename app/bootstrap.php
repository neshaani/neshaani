<?php

use \Slim\App as Slim;
use \Slim\Views\Twig as Twig;
use \Slim\Views\TwigExtension as TwigExtension;

ini_set('display_errors', 'On'); // todo: to be turned off in prod env
date_default_timezone_set('America/New_York'); // todo: implement a settings file

require __DIR__ . '/../vendor/autoload.php';

$app = new Slim([
		'settings' => [
			'displayErrorDetails' => true, // todo: to be turned off in prod env
			'baseURL' => 'http://neshaani.app/',
		]
]);

$container = $app->getContainer();

$container['view'] = function($container) {
	
	$view = new Twig(__DIR__ . '/../resources/views/', [
		'cache' => false, //todo: implement caching in prod env
	]);

	$view->addExtension(new TwigExtension(
		$container->router,
		$container->request->getUri()
	));

	return $view;

};

require __DIR__ . '/database.php';
require __DIR__ . '/routes.php';