<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

   
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    
    $routes->fallbacks(DashedRoute::class);
});

// Criar uma nova rota

Router::prefix('api/v1', function(RouteBuilder $router){

    $router->extensions(['json']); // Permite acessar os dados com a extensão json
    $router->resources('Properties');
    $router->resources('Districts');
    $router->resources('Users');
    $router->resources('PropertiesTypes');

    $router->fallbacks(DashedRoute::class);

    Router::connect('/api/v1/users/register', ['controller' => 'Users', 'action' => 'add', 'prefix' => 'api/v1']);
    Router::connect('/api/v1/users/token', ['controller' => 'Users', 'action' => 'token', 'prefix' => 'api/v1']);

});


Plugin::routes();
