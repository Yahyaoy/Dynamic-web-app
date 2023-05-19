    <?php
    // Set the page heading
    $heading = 'My Note';

    // Load the database configuration settings
    $config = require('config.php');

    // Create a new instance of the database class
    $db = new Database($config['database']);

    // Retrieve the note ID from the URL parameters
    $id = $_GET['id'];

    // Retrieve the note record from the database
    $note = $db->query('select * from notes where id = :id', [
        ':id' => $id
    ])->findOrFail();

    // Set the current user ID
    $currentUserId = 1;

    authorize($note['user_id'] == $currentUserId);

    // Load the note view template
    require "views/note.view.php";
