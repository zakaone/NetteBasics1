<?php

use Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


// Load Nette Framework
require __DIR__ . '/../../../Nette/loader.php';


// Configure application
$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
$configurator->enableDebugger(__DIR__ . '/../log');

// Enable RobotLoader - this will load all classes automatically
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config.neon');
$container = $configurator->createContainer();

// Setup router using mod_rewrite detection
if (function_exists('apache_get_modules') && in_array('mod_rewrite', apache_get_modules())) {
	$container->router[] = new Route('index.php', 'Dashboard:default', Route::ONE_WAY);
	$container->router[] = new Route('<presenter>/<action>[/<id>]', 'Dashboard:default');

} else {
	$container->router = new SimpleRouter('Dashboard:default');
}

// Run the application!
$container->application->run();
