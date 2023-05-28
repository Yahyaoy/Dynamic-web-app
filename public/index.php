<?php
const BASE_PATH  = __DIR__. '/../';
require BASE_PATH . "Core/functions.php";

spl_autoload_register(function($class){
    $class = str_replace('\\','/' ,$class); // بدنا نقلب السلاش عشان نستخدم الداتا بيز من اليوز من خلال النيم سبيس
//    dd(base_path("{$class}.php"));
    require BASE_PATH . "{$class}.php";
});

require BASE_PATH . 'Core/router.php';








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
