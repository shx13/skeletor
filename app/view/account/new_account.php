<div id="container">

<?php $this->renderFeedbackMessages(); ?>

<h1>Create New Account</h1>

<form method="post" action="<?php echo Config::get('URL'); ?>account/new-account-action/">
  <input type="text" name="new_account_name" placeholder="User Name">
  <input type="password" name="new_account_password" placeholder="Password">
  <input type="password" name="new_account_password_repeat" placeholder="Repeat Password">
  <input type="submit" value="Create New Account">
</form>

</div>
