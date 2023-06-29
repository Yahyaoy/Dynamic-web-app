<?php
use Core\Router;

const BASE_PATH  = __DIR__. '/../';
require BASE_PATH . "Core/functions.php";

spl_autoload_register(function($class){
    $class = str_replace('\\','/' ,$class); // بدنا نقلب السلاش عشان نستخدم الداتا بيز من اليوز من خلال النيم سبيس
//    dd(base_path("{$class}.php"));
    require BASE_PATH . "{$class}.php";
});
require base_path('bootstrap.php');

require base_path('Core/router.php');
$router = new \Core\Router();
$routes = require base_path('routes.php');

// Get the path from the URI
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];// راح يوخذ لميثود من الاينبوت لو ما لقى هيوخذ من الريكويست
//dd($method);
$router->route($uri, $method);
//require BASE_PATH . 'Core/Router.php';






// connect to our MySql database.
//        $config = require('config.php');
//        $db = new Database($config['database']);




//        $id = $_GET['id']; // Query
////       / // never ever ever except user input and inline it as part of a database مهم  جدا
////        $query = "select * from posts where id=?";
//        $query = "select * from posts where id= :id";
//        $posts =  $db->query($query,[":id" => $id])->fetch();
//
//        dd($posts);
//        foreach ($posts as $post){
//            echo "<li>". $post['title'] . "</li>";
//        }
