<?php

use \Slim\App as Slim;
use \Slim\Views\Twig as Twig;
use \Slim\Views\TwigExtension as TwigExtension;

ini_set('display_errors', 'On'); // todo: to be turned off on prod env

require __DIR__ . '/../vendor/autoload.php';

$app = new Slim([
		'settings' => [
			'displayErrorDetails' => true, // todo: to be turned off in prod env
		]
	]);

$container = $app->getContainer();

$container['view'] = function($container) {
	
	$view = new Twig(__DIR__ . '/../resources/views/', [
		'cache' => false, //todo: implement caching on prod env
	]);

	$view->addExtension(new TwigExtension(
		$container->router,
		$container->request->getUri()
	));

	return $view;

};

require __DIR__ . '/database.php';
require __DIR__ . '/routes.php';