<?php

/*
* Class RegistrationModel
*
* Everything registration-related happens here.
*/

class RegistrationModel {

  /*
  * Registration of new account.
  *
  * 1. Use external methods to validate user input
  * 2. Create a password hash
  * 3. Insert new data into database
  * 4. Return true
  */

  public static function CreateNewAccount() {

    // validate input
    if(!self::validateUserName(Request::post('new_account_name'))) return false;
    if(!self::validateUserPassword(Request::post('new_account_password'), Request::post('new_account_password_repeat'))) return false;

    // connect to database
    $db = Database::getFactory()->getConnection();

    if(!$db) {
      Session::add('feedback_negative', 'Critical error. Can\'t connect to database.');
		  return false;
    }

    // get a password hash
    $passwordHash = password_hash(Request::post('new_account_password'), PASSWORD_DEFAULT);

		// write new users data into database
		$sql = "INSERT INTO users ( user_id,  user_name,  user_password,  user_registration_time)
                       VALUES (:user_id, :user_name, :user_password, :user_registration_time)";

		$query = $db->prepare($sql);

		$query->execute(array(':user_id'       => null,
		                      ':user_name'     => Request::post('new_account_name'),
		                      ':user_password' => $passwordHash,
		                      ':user_registration_time' => time('c')));

		$count =  $query->rowCount();
		if ($count == 1) {
		  Session::add('feedback_positive', 'New account created successfully.');
			return true;
		}

    // if it gets to this point, something went wrong
    Session::add('feedback_negative', 'Something went wrong.');
		return false;

  }

  /*
  * Validate user input (user name) when creating a new account
  *
  * 1. Check if it fits the alphanumeric pattern and if it's long enough (min 3, max 20)
  * 2. Connect to database and check if user name is unique (no one has registered it before)
  */

  public static function validateUserName($name) {

    // check if it fits the alphanumeric pattern and its length (min 3, max 20)
    if(!filter_var($name,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[A-Za-z][a-zA-Z0-9]{3,20}$/")))) {
      Session::add('feedback_negative', 'Error. User name can\'t be longer than 20 or shorter than 3 characters. It also can\'t contain any other characters than letters and numbers and it has to start with a letter.');
		  return false;
    }

    // check if the user name is unique
    $db = Database::getFactory()->getConnection();
    $query = $db->prepare("SELECT user_id FROM users WHERE user_name = :user_name LIMIT 1");
    $query->execute(array(':user_name' => $name));
    if ($query->rowCount() != 0) {
      Session::add('feedback_negative', 'User name already exists.');
      return false;
    }

    return true;
  }

  /*
  * Validate user input (user password) when creating a new account
  *
  * 1. Check if its long enough (min. 8 characters, max 255 chars)
  * 2. Check if password repeat is long enough (min. 8 characters, max 255 chars)
  * 3. Check if first password matches the repeat
  */

  public static function validateUserPassword($password, $passwordRepeat) {

    // check if the password is long enough
    if(strlen($password) < 8 || strlen($password) > 255) {
      Session::add('feedback_negative', 'Error. Password has to be longer than 8 characters.');
		  return false;
    }

    // check if the password repeat is long enough
    if(strlen($passwordRepeat) < 8 || strlen($passwordRepeat) > 255) {
      Session::add('feedback_negative', 'Error. Password has to be longer than 8 characters.');
		  return false;
    }

    // check if the password matches the repeat
    if($password !== $passwordRepeat) {
      Session::add('feedback_negative', 'Error. Passwords you entered doesn\'t match.');
		  return false;
    }

    return true;
  }

}
