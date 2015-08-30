<?php

/*
* Class LoginModel
*
* Everything login-related happens here.
*/

class LoginModel {

  /*
  * login - logs the user in
  * 
  * 1. Validates the length of user input (user name & password).
  * 2. Get the user details for further validation (password verification)
  * 3. If password verification correct, set session variables and return true
  */

  public static function login() {

    // validate the length
    if(   strlen(Request::post('login_name')) < 2
       || strlen(Request::post('login_name')) > 20
       || strlen(Request::post('login_password')) < 8
       || strlen(Request::post('login_password')) > 255) {
      // give the same feedback that's on wrong user name to not give out any data
      Session::add('feedback_negative', 'Error. Username or password wrong.');
		  return false;
    }

    // get user details
    $user = self::getUserData('user_name', Request::post('login_name'));

    // if there's no user with given name
    if(!$user) {
      Session::add('feedback_negative', 'Error. Username or password wrong.');
		  return false;
    }

    // check if password ok
    if (!password_verify(Request::post('login_password'), $user->user_password)) {
      // give the same feedback that's on wrong user name to not give out any data
      Session::add('feedback_negative', 'Error. Username or password wrong.');
		  return false;
    }

    // set session variables
    Session::set('user_id',   $user->user_id);
    Session::set('user_name', $user->user_name);
    Session::set('user_permissions', $user->user_permissions);

    // set user as logged-in
    Session::set('user_logged_in', true);

    return true;

  }

  /*
  * get data of the user
  *
  * $key is the key to look for, $value is its value
  * i.e. if you want to get a data of the user with user_name 'shx'
  * getUserData('user_name','shx');
  */

  public static function getUserData($key, $value) {

    // connect to database
    $db = Database::getFactory()->getConnection();

    $sql = "SELECT * FROM users WHERE ".$key." = :key LIMIT 1";
    $query = $db->prepare($sql);
    $query->execute(array(':key' => $value));

    return $query->fetch();
  }

  /*
  * LOG OUT
  *
  * Destroys the session and deletes the remember me cookie.
  */

  public static function logout() {
    setcookie('remember_me', false, time() - (3600 * 24 * 3650), Config::get('COOKIE_PATH'));
    Session::destroy();
  }

}
