<?php
require "functions.php";
require "router.php";
//
// connect to our MySql database.
        require 'Database.php';
        $db = new Database();
        $posts =  $db->query("select * from posts ")->fetchAll(PDO::FETCH_ASSOC);

        dd($posts);
//        foreach ($posts as $post){
//            echo "<li>". $post['title'] . "</li>";
//        }



//class Person{
//    public $name;
//    public $age;
//    public function breathe(){
//        echo $this->name . ' is breathing';
//    }
//}
//
//$person = new Person();
//$person->name = 'yahya khalid';
//$person->age = 25;
//dd($person->breathe());