<?php

  class SessionController extends BaseController{

    public static function login(){
        View::make('login.html');
<<<<<<< HEAD
=======
    }
    public static function handle_login() {
        $user = Blogger::findByName(trim($_POST['username']));
            
        if($user && $user->password === crypt($_POST['password'], $user->password)) {
            $_SESSION['user'] = $user->userId;
            if ($user->isAdmin()) {
                $_SESSION['is_admin'] = true;
            }
            Redirect::to('/');
        } else {
           View::make('login.html', array('errors' => array('Virheelliset tunnistetiedot!'), 'username' => $_POST['username']));
        }
>>>>>>> upstream/master
    }
    public static function handle_login() {
        $params = $_POST;
        $user = Blogger::authenticate($params['username'], $params['password']);

<<<<<<< HEAD
        if(!$user){
            View::make('login.html', array('error' => 'Wrong password', 'username' => $params['username']));
        } else {
            $_SESSION['user'] = $user->userId;
            Redirect::to('/');
        }
    }

=======
>>>>>>> upstream/master
    public static function register() {
        View::make('register.html');
    }
    
    public static function handle_register() {
<<<<<<< HEAD
        $params = $_POST;
        $email = $params['email'];
        $username = $params['username'];
        $password = $params['password']; //crypt($params['password']);
        
        $user = new Blogger(array('username' => $username, 'password' => $password, 'email' => $email));
            
        if ($user->save()) {
            //redirect to change profileDescription
            Redirect::to('/');
        } 
    }
  }
=======
        //if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password'])) {
        //    Redirect::to('/register', array('errors' => array('Täytä kaikki kentät ennen lähettämistä!')));
        //    return;
        //}
        
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = crypt($_POST['password']); //crypt($params['password']); //allow spaces maybe
        
        $user = new Blogger(array('username' => $username, 'password' => $password, 'email' => $email));
        
        $errors = $user->errors();
        
        if (empty($errors)) {
            try {
                $user->save();
                $_SESSION['user'] = $user->userId;
                Redirect::to('/user/'. $user->userId . '/edit');
            } catch (PDOException $e) {
                $error = $e->getMessage();
                
                if (strpos($error, 'blogger_email_key') !== FALSE) {
                    $error = 'Sähköposti on jo varattu!';
                } elseif (strpos($error, 'blogger_username_key') !== FALSE) {
                    $error = 'Käyttäjätunnus on jo varattu!';
                } else {
                    $error = 'Tuntematon virhe';
                }
                
                Redirect::to('/register', array('errors' => array($error)));
            }
        } else {
            Redirect::to('/register', array('errors' => $errors));
        }
    }
    
    public static function handle_logout() {
        unset($_SESSION['user']);
        unset($_SESSION['is_admin']);
        Redirect::to('/');
    }
}
>>>>>>> upstream/master
