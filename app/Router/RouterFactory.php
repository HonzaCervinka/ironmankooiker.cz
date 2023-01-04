<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;

		$admin = new RouteList('Admin');
        $admin[] = new Route('admin/<presenter>/<action>[/<id>]', 'Homepage:default');
		$router[] = $admin;

		$hra = new RouteList('Cestovani');
        $hra[] = new Route('cestovani/<action>[/<id>]', 'Homepage:default');
		$router[] = $hra;

		$hra = new RouteList('Recepty');
        $hra[] = new Route('recepty/<action>[/<id>]', 'Homepage:default');
		$router[] = $hra;

		$hra = new RouteList('PanDeskovek');
        $hra[] = new Route('panDeskovek/<presenter>/<action>[/<id>]', 'Homepage:default');
		$router[] = $hra;

		$hra = new RouteList('ToDo');
        $hra[] = new Route('todo/<presenter>/<action>[/<id>]', 'Homepage:default');
		$router[] = $hra;

		$web = new RouteList('Web');
        $web[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		$router[] = $web;

		return $router;
	}
}
