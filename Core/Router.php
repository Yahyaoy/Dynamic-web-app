<?php
namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
        'uri' => $uri,
        'controller' => $controller,
        'method' => $method,
        'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
         return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                //apply the middleware
                    if($route['middleware']){
                      Middleware::resolve($route['middleware']);
                    }
                //second way
//                  if($route['middleware']){
//                      $middleware = Middleware::MAP[$route['middleware']];
//                      (new $middleware())->handle();
//                  }
                  // first way
//                if($route['middleware'] === 'guest'){
//                    (new Guest)->handle();
//                }
//                if($route['middleware'] === 'auth'){
////                    $auth = new Auth();
////                    $auth->handle();
//                    (new Auth)->handle();
//                }

                return require base_path($route['controller']);
            }
    }

    $this->abort();
    }

    public function previousUrl(){
        return $_SERVER['HTTP_REFERER'];
    }
    protected function abort($code = 404)
    {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
    }
    }
//
//$routes = require base_path('routes.php');
//
//
//// Map the URI to the corresponding controller
//function routeToController($uri, $routes) {
//    // Check if the URI is defined in the routes
//    if (array_key_exists($uri, $routes)) {
//        // If yes, require the corresponding controller
//        require base_path($routes[$uri]);
//    } else {
//        // If no, abort with a 404 error
//        abort();
//    }
//}
//
//// Abort the request with an error response
//function abort($code = 404) {
//    // Set the HTTP response code
//    http_response_code($code);
//    // Require the corresponding error view
//    require base_path("views/{$code}.php");
//    // Terminate the script
//    die();
//}
//
//// Get the path from the URI
//$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//
//// Route the request to the appropriate controller
//routeToController($uri, $routes);
