<?php
// set the heading of the page
$heading = 'Notes';

// load the database configuration from the file
$config = require('config.php');

// create a new database object using the configuration
$db = new Database($config['database']);

// query the database to get all notes for the current user
$notes = $db->query('select * from notes where user_id=1')->get();

// load the notes view and pass in the notes
require "views/notes.view.php";
