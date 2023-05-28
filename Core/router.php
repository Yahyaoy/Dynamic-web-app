<?php

$routes = require base_path('routes.php');


// Map the URI to the corresponding controller
function routeToController($uri, $routes) {
    // Check if the URI is defined in the routes
    if (array_key_exists($uri, $routes)) {
        // If yes, require the corresponding controller
        require base_path($routes[$uri]);
    } else {
        // If no, abort with a 404 error
        abort();
    }
}

// Abort the request with an error response
function abort($code = 404) {
    // Set the HTTP response code
    http_response_code($code);
    // Require the corresponding error view
    require base_path("views/{$code}.php");
    // Terminate the script
    die();
}

// Get the path from the URI
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Route the request to the appropriate controller
routeToController($uri, $routes);
