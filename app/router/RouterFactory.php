<?php

namespace App;

use Nette,
    Nette\Application\Routers\RouteList,
    Nette\Application\Routers\Route,
    Nette\Application\Routers\SimpleRouter;

/**
 * Router factory.
 */
class RouterFactory {

    /**
     * @return \Nette\Application\IRouter
     */
    public static function createRouter() {


        $router = new RouteList();
        $router[] = $pageRouter = new RouteList('Page');
        $pageRouter[] = new Route('admin/page/<presenter>/<action>[/<id>]', 'Admin:Page:default');
   
        $router[] = $adminRouter = new RouteList('Admin');
        $adminRouter[] = new Route('admin/<presenter>/<action>/[<id>]', 'Homepage:default');

        $router[] = $frontRouter = new RouteList('Front');
        $frontRouter[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');




        return $router;
    }

}
