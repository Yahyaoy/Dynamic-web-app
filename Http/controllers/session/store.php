<?php

use Core\App;
use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

//var_dump('I have post');
$email = $_POST['email'];
$password = $_POST['password'];
                                                           
$form = new LoginForm();

if($form->validate($email, $password)){
    if ((new Authenticator())->attempt($email, $password)) {
        redirect('/');
    }
//$errors = [];
//if(!Validator::email($email)){
//    $errors['email'] = 'Please provide a valid email address';
//}
//
//if(!Validator::string($password)){
//    $errors['password'] = 'Please provide a valid password';
//}

//if(!empty($errors)){
//    return view('session/create.view.php',[
//        'errors' => $errors
//    ]);
//}

    $form->error('email', 'No matching account found for that email address and password. ');
}

//$_SESSION['_flashed']['errors'] = $form->errors();
Session::flash('errors', $form->errors());
Session::flash('old',[
       'email' => $_POST['email']
]);

return redirect('/login');

//return view('session/create.view.php',[
//    'errors' => $form-> errors()
//]);

//
//$user = $db->query('select * from users where email= :email',[
//   'email' => $email
//])->find();
//
//if($user){
//    // if a password is match or no
//    if(password_verify($password, $user['password'])){
//        login([
//            'email' => $email
//        ]);
//        header('location:/');
//        exit();
//    }
//}
//
//return view('session/create.view.php',[
//    'errors' => [
//        'email' => 'No matching account found for that email address and password.'
//    ]
//]);
