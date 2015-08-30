<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>Skeletor</title>

<link rel="shortcut icon" type="image/png" href="<?php echo Config::get('URL'); ?>pub/img/favicon.png"/>

<link rel="stylesheet" href="<?php echo Config::get('URL'); ?>pub/css/reset.css">
<link rel="stylesheet" href="<?php echo Config::get('URL'); ?>pub/css/style.css">

<?php
  // add extra CSS (declared in the controller file)
  if(isset($this->extraCSS)) {
    foreach ($this->extraCSS as $xcss) {
      echo '<link rel="stylesheet" href="'.Config::get('URL').'pub/css/'.$xcss.'">'."\r\n";
    }
  }
?>

</head>
<body>

<div id="mainMenu">
  <ul>
    <li><a href="<?php echo Config::get('URL'); ?>">Home</a></li>
    <li>-</li>
    <li><a href="<?php echo Config::get('URL').'what-is-skeletor/'; ?>">What is Skeletor?</a></li>
    <li>-</li>
    <li><a href="<?php echo Config::get('URL').'account/new-account/'; ?>">Register</a></li>
    <li>-</li>
    <li><a href="<?php echo Config::get('URL').'account/log-in/'; ?>">Login</a></li>
    <li>-</li>
    <li><a href="https://github.com/shx13/skeletor">GitHub</a></li>
  </ul>

<?php ### display only if user is logged-in ## 
if(Session::get('user_logged_in') == true): ?>

  <ul>
    <li><a href="<?php echo Config::get('URL').'account/my-account/'; ?>">My Account</a></li>
    <li>-</li>
    <li><a href="<?php echo Config::get('URL').'account/logout/'; ?>">Log Out</a></li>
  </ul>

<?php endif; ?>

</div>
