<?php
session_start();
// Define the routes
//return [
//    '/' => 'controllers/index.php',
//    '/about' => 'controllers/about.php',
//    '/note' => 'controllers/notes/show.php',
//    '/notes' => 'controllers/notes/index.php',
//    '/notes/create' => 'controllers/notes/create.php',
//    '/contact' => 'controllers/contact.php',
//];

$router->get('/','Http/controllers/index.php');
$router->get('/about','Http/controllers/about.php');
$router->get('/contact','Http/controllers/contact.php');

$router->get('/notes','Http/controllers/notes/index.php')->only('auth');
$router->get('/note','Http/controllers/notes/show.php');
$router->delete('/note','Http/controllers/notes/destroy.php');

$router->get('/notes/create','Http/controllers/notes/create.php');
$router->post('/notes','Http/controllers/notes/store.php');

$router->get('/notes/edit','Http/controllers/notes/edit.php');
$router->patch('/note','Http/controllers/notes/update.php');

$router->get('/register', 'Http/controllers/registration/create.php')->only('guest');
$router->post('/register', 'Http/controllers/registration/store.php');

$router->get('/login', 'Http/controllers/session/create.php')->only('guest');
$router->post('/session', 'Http/controllers/session/store.php')->only('guest');
$router->delete('/logout', 'Http/controllers/session/destroy.php')->only('auth');
//dd($router->routes);