<?php
const BASE_PATH  = __DIR__. '/../';
require BASE_PATH."functions.php";

spl_autoload_register(function($class){
    require base_path("Core/{$class}.php");
});

require base_path('router.php');








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
