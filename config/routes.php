<?php
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

# LIST
$routes->add('customers', new Route(
    '/customers', ['_controller' => App\Action\CustomersAction::class], [], [], '', [], ['GET']
));

# ONE
$routes->add('customer', new Route(
    '/customer/{id}', ['_controller' => App\Action\CustomerAction::class], ['id' => '\d+'], [], '', [], ['GET']
));

# CREATE
$routes->add('customer.create', new Route(
    '/customer/create', ['_controller' => App\Action\CustomerCreateAction::class], [], [], '', [], ['POST']
));

# UPDATE
$routes->add('customer.update', new Route(
    '/customer/{id}', ['_controller' => App\Action\CustomerUpdateAction::class], ['id' => '\d+'], [], '', [], ['PUT']
));

# DELETE
$routes->add('customer.delete', new Route(
    '/customer/{id}', ['_controller' => App\Action\CustomerDeleteAction::class], ['_id' => '\d+'], [], '', [], ['DELETE']
));

return $routes;
