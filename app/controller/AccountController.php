<?php

/**
* Account Controller
*
* Login, Account Registration, Account View etc.
* Handles all stuff related to accounts.
*/

class AccountController extends Controller {

  /*
  * construct from Controller class
  */

  public function __construct() {
    parent::__construct();
  }

  /*
  * Redirect the user to login page or to the user account,
  * depends on if user is logged in or not.
  */

  public function index() {
    if (!Session::get('user_logged_in')) Teleport::to('account/login/');
    if ( Session::get('user_logged_in')) Teleport::to('account/my-account/');
  }

  /*
  * Login Form
  *
  * Simple User Name / Password form
  */

  public function log_in() {
    Auth::LoggedOutOnly();
    $this->View->render('account/login',
                  array(
                    // declaration of extra css (always set as array), included in common/header.php
                    'extraCSS' => array(),

                    // declaration of extra js (always set as array), included in common/header.php
                    'extraJS' => array()
                  ));
  }

  /*
  * Login Action
  *
  * Activates the LoginModel::Login method(), which takes the input from login form
  * and logs-in the user (or not)
  */

  public function login_action() {
    $login = LoginModel::Login();

    if ($login) {
      Teleport::to('account/my-account/');
    } else {
      Teleport::to('account/log-in/');
    }
  }

  /*
  * New Account Form
  *
  * Simple User Name / Password / Repeat Password form
  */

  public function new_account() {
    Auth::LoggedOutOnly();
    $this->View->render('account/new_account',
                  array(
                    // declaration of extra css (always set as array), included in common/header.php
                    'extraCSS' => array(),

                    // declaration of extra js (always set as array), included in common/header.php
                    'extraJS' => array()
                  ));
  }

  /*
  * New Account Action
  *
  * Activates the RegistrationModel::CreateNewAccount() method, which takes
  * the input from account registration form and creates new account (or not)
  */

  public function new_account_action() {

    $newAccount = RegistrationModel::CreateNewAccount();

    if ($newAccount) {
      Teleport::to('account/log-in/');
    } else {
      Teleport::to('account/new-account/');
    }
  }

  /*
  * MY ACCOUNT
  *
  * Show the logged-in user his/her account page.
  */ 

  public function my_account() {
    Auth::LoggedInOnly();
    $this->View->render('account/my_account',
                  array(
                    // declaration of extra css (always set as array), included in common/header.php
                    'extraCSS' => array(),

                    // declaration of extra js (always set as array), included in common/header.php
                    'extraJS' => array()
                  ));
  }

  /*
  * LOG OUT
  *
  * Destroys the session and deletes the remember me cookie.
  */

  public function logout() {
    LoginModel::logout();
    Teleport::home();
  }

}
