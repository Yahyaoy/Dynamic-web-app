<?php
require "functions.php";
//require "router.php";
//
// connect to our MySql database.
        require 'Database.php';
        $config = require('config.php');
        $db = new Database($config['database']);
        $id = $_GET['id'];
        // never ever ever except user input and inline it as part of a database مهم  جدا
//        $query = "select * from posts where id=?";
        $query = "select * from posts where id= :id";
        $posts =  $db->query($query,[':id' => $id])->fetch();

        dd($posts);
//        foreach ($posts as $post){
//            echo "<li>". $post['title'] . "</li>";
//        }
