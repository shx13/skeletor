<?php $this->renderFeedbackMessages(); ?>

<h1>Log In</h1>

<form method="post" action="<?php echo Config::get('URL'); ?>account/login-action/">
  <input type="text" name="login_name" placeholder="User Name">
  <input type="password" name="login_password" placeholder="Password">
  <input type="submit" value="Log In">
</form>

</div>
