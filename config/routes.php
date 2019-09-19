<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

# Search
$routes->add('customers', new Route(
    '/customers', ['_controller' => 'App\Action\CustomersAction::handle'], [], [], '', [], ['POST']
));

# ONE
$routes->add('customer', new Route(
    '/customer/{customerId}', ['_controller' => 'App\Action\CustomerAction::handle'], ['customerId' => '\d+'], [], '',
    [], ['GET']
));

# CREATE
$routes->add('customer.create', new Route(
    '/customer/create', ['_controller' => 'App\Action\CustomerCreateAction::handle'], [], [], '', [], ['POST']
));

# UPDATE
$routes->add('customer.update', new Route(
    '/customer/{customerId}', ['_controller' => 'App\Action\CustomerUpdateAction::handle'], ['customerId' => '\d+'], [],
    '', [], ['PUT']
));

# DELETE
$routes->add('customer.delete', new Route(
    '/customer/{customerId}', ['_controller' => 'App\Action\CustomerDeleteAction::handle'], ['customerId' => '\d+'], [],
    '', [], ['DELETE']
));

return $routes;
