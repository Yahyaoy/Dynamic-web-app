    <?php
    use Core\Database;
    use Core\App;

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

       // Load the note view template
       view("notes/show.view.php",[
           'heading' => 'Note',
           'note' => $note
       ]);


