<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	'driver' 	=> 'mysql',
	'host'		=> '127.0.0.1',
	'port'		=> '8889', // MAMP
	'database' 	=> 'neshaani',
	'username'	=> 'root',
	'password'	=> 'secret',
	'charset'	=> 'utf8',
	'collation' => 'utf8_unicode_ci',
]);

$capsule->bootEloquent();