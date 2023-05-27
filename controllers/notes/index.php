<?php

// load the database configuration from the file
$config = require base_path('config.php');

// create a new database object using the configuration
$db = new Database($config['database']);

// query the database to get all notes for the current user
$notes = $db->query('select * from notes where user_id=1')->get();

// load the notes view and pass in the notes
view("notes/index.view.php",[
    'heading' => 'Notes',
    'notes' => $notes
]);