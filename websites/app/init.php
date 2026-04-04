<?php
require_once "../app/vendor/autoload.php";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Core\App;
use Core\Router;
use Core\View;
use Core\Middleware;
use Core\SessionManager;
use Core\Container;

$container = new Container();
$container->Add(SessionManager::class, fn($c) => new SessionManager);
$container->Add(Middleware::class, fn($c) => new Middleware($c->Make(SessionManager::class)));
$container->Add(Router::class, fn($c) => new Router(new View(), $c->Make(Middleware::class)));
$container->Add(App::class, fn($c) => new App($c->Make(Router::class)));

$app = $container->Make(App::class);