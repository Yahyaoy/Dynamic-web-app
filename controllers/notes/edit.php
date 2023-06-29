<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
// Set the current user ID
$currentUserId = 1;

// Retrieve the note ID from the URL parameters
$id = $_GET['id'];

// Retrieve the note record from the database
$note = $db->query('select * from notes where id = :id', [
    ':id' => $id
])->findOrFail();


authorize($note['user_id'] == $currentUserId);


// load the notes view and pass in the notes
view("notes/edit.view.php",[
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);