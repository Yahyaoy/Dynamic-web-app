<?php
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

// query the database to get all notes for the current user
$notes = $db->query('select * from notes where user_id=1')->get();

// load the notes view and pass in the notes
view("notes/index.view.php",[
    'heading' => 'Notes',
    'notes' => $notes
]);