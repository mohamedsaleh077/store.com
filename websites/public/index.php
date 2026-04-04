<?php

/* 
 * Copyright (C) 2026 mohamed
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once "../app/init.php";

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