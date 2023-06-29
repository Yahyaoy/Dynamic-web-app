<?php
use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
// Set the current user ID
$currentUserId = 1;

// Retrieve the note ID from the URL parameters
$id = $_GET['id'];

// Retrieve the note record from the database
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] == $currentUserId);

$errors = [];

if(! Validator::string($_POST['text'], 1, 1000)) {
    $errors['text'] = 'A body of no more than 1,000 characters is required.';
}



// Load the note view template
if(count($errors)){
    return view("notes/show.view.php",[
    'heading' => 'Note',
    'errors' => $errors,
    'note' => $note
    ]);
}

$db->query('update notes set text = :text where id = :id',[
    'id' => $_POST['id'],
    'text' => $_POST['text']
]);

header('location: /notes');
die();