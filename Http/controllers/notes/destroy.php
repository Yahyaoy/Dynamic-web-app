    <?php
    use Core\Database;
    use Core\App;

        $db = App::resolve(Database::class);

//        dd($db);
        // Set t/he current user ID
        $currentUserId = 1;

        // form was submitted , delete the current note

        // Retrieve the note record from the database
        $note = $db->query('select * from notes where id = :id', [
            ':id' => $_POST['id']
        ])->findOrFail();

        authorize($note['user_id'] == $currentUserId);

        $db->query('delete from notes where id = :id',[
            'id'=>$_GET['id']
        ]);
        header('location:/notes');
        exit();
