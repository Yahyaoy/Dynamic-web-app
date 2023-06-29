<?php
use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

require base_path('Core/Validator.php');

$errors=[];

if(!Validator::string($_POST['text'],1,1000)){
    $errors['text'] = 'A text is must be between 1 and 1000 characters';
}
if(!empty($errors)){
    return view("notes/create.view.php",[
       'heading' => 'Create Note',
       'errors' => $errors
    ]);
}

if(empty($errors)){
    $db->query('INSERT INTO notes(text,user_id) VALUES(:text,:user_id)',[
        'text' => $_POST['text'],
        'user_id' =>1
    ]);

    header('location: /notes');
    die();
}