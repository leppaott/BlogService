<?php

<<<<<<< HEAD
  class BaseController{
    public static function get_user_logged_in() {
      if (!isset($_SESSION['user'])) return NULL;
      return Blogger::find($_SESSION['user']);
=======
class BaseController {
    public static function get_user_logged_in() {
        if (!isset($_SESSION['user'])) return NULL;
        return $_SESSION['user'];
>>>>>>> upstream/master
    }

    public static function check_logged_in() {
        return isset($_SESSION['user']);
    }
<<<<<<< HEAD
  }
=======
    
    public static function require_logged_in() {
        if (!isset($_SESSION['user'])) {
            Redirect::to('/login', array('message' => 'Tietyt asiat vaativat sisäänkirjautumista!'));
        }
    }
}
>>>>>>> upstream/master
