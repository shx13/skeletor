<?php

/**
 * Class Auth
 * Checks if user is logged in, if not then sends the user to "yourdomain.com/login".
 * Auth::checkAuthentication() can be used in the constructor of a controller (to make the
 * entire controller only visible for logged-in users) or inside a controller-method to make only this part of the
 * application available for logged-in users.
 */
class Auth {

  public static function LoggedInOnly() {
    // if user is not logged in...
    if (!Session::get('user_logged_in')) {
      Session::add('feedback_negative', 'Error. Please log-in and try again.');
      Teleport::to('admin/login/');
      exit();
    }
  }

  public static function LoggedOutOnly() {
    // if user is logged in...
    if (Session::get('user_logged_in')) {
      Session::add('feedback_negative', 'Error. To access this section of the website, you need to log-out first.');
      Teleport::to('admin/control-panel/');
      exit();
    }
  }

}
