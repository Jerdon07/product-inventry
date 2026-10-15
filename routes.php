<?php

use util\Router;

$router = new Router;

/* Registration */
$router->get('/register', 'registration/create-controller.php')->only('guest');
/* Registration API */
$router->post('/register', 'api/registration/store-controller.php')->only('guest');

/* Login */
$router->get('/login', 'session/create-controller.php')->only('guest');
/* Session API */
$router->get('/api/sessions', 'api/sessions/index-controller.php');
$router->post('/api/sessions/store', 'api/sessions/store-controller.php')->only('guest');
$router->delete('/sessions', 'session/delete-controller.php')->only('auth')->only('auth');

/* Product Views */
$router->get('/', 'index.php');

$router->get('/products', 'products/index-controller.php')->only('auth');
$router->get('/product', 'products/show-controller.php')->only('auth');
$router->get('/product/edit', 'products/edit-controller.php')->only('auth');
$router->put('/product/edit', 'products/update-controller.php')->only('auth');

/* Product API */
$router->get('/api/products', 'api/products/index-controller.php')->only('auth');
$router->post('/api/products/create', 'api/products/store-controller.php')->only('auth');
$router->delete('/api/product', 'api/products/destroy-controller.php')->only('auth');