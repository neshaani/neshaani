<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	'driver' 	=> $config['db']['driver'],
	'host'		=> $config['db']['host'],
	'port'		=> $config['db']['port'],
	'database' 	=> $config['db']['database'],
	'username'	=> $config['db']['username'],
	'password'	=> $config['db']['password'],
	'charset'	=> $config['db']['charset'],
	'collation' => $config['db']['collation']
]);

$capsule->bootEloquent();