<div class="center" id="container">
<?php $this->renderFeedbackMessages(); ?>

<img src="<?php echo Config::get('URL'); ?>pub/img/logo.png" alt="">

<h1>What is Skeletor?</h1>

<p>Skeletor is a simple PHP Model-View-Controller (MVC) framework.<br>The source is available on GIT under MIT license.<br>Feel free to copy &amp; modify the code.</p>

<ul>

  <li>Device being used: <?php echo Config::get('DEVICE'); ?></li>
  <li>Screen Resolution: <?php echo $this->screen['width'].'x'.$this->screen['height']; ?></li>
  <li>Browser Size: <?php echo $this->browser['width'].'x'.$this->browser['height']; ?></li>

</ul>
</div>
