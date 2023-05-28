    <?php
    use Core\Database;
    // Load the database configuration settings
    $config = require base_path('config.php');

    // Create a new instance of the database class
    $db = new Database($config['database']);

   if($_SERVER['REQUEST_METHOD']=='POST'){
       // form was submitted , delete the current note

       // Retrieve the note record from the database
       $note = $db->query('select * from notes where id = :id', [
           ':id' => $_GET['id']
       ])->findOrFail();

       // Set the current user ID
       $currentUserId = 5;

       authorize($note['user_id'] == $currentUserId);

       $db->query('delete from notes where id = :id',[
           'id'=>$_GET['id']
       ]);
       header('location:/notes');
       exit();
   }else{

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
       view("notes/show.view.php",[
           'heading' => 'Note',
           'note' => $note
       ]);
   }
