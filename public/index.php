<?php

namespace App;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

include "config/database.php";
$routes = include "config/routes.php";

$request = Request::createFromGlobals();

$matcher = new UrlMatcher($routes, new RequestContext());

$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new RouterListener($matcher, new RequestStack()));

try {
    $controllerResolver = new ControllerResolver();
    $argumentResolver = new ArgumentResolver();

    $kernel = new HttpKernel($dispatcher, $controllerResolver, new RequestStack(), $argumentResolver);

    $response = $kernel->handle($request);
    $response->send();

    $kernel->terminate($request, $response);

} catch (ResourceNotFoundException $e) {
    return new Response('Not Found', 404);
} catch (Exception $e) {
    return new Response('An error occurred', 500);
}
