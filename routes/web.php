<?php 


use eftec\bladeone\BladeOne;
use App\Core\Router;
session_start();

$router = new Router();

$router->get('/', "UserController@users");
$router->get('/create', "UserController@createForm");
$router->post('/create', "UserController@create");

$router->get('/edit', "UserController@editForm");
$router->post('/edit', "UserController@edit");

$router->post('/delete', "UserController@deleteUser");

$router->dispatch();