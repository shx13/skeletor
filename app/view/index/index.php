<div id="container">

<?php $this->renderFeedbackMessages(); ?>

<img src="<?php echo Config::get('URL'); ?>pub/img/logo.png" alt="">

<h1>Welcome to Skeletor</h1>

<p>"I give myself permission to be fabulous."</p>

<ul>

  <li>Device being used: <?php echo Config::get('DEVICE'); ?></li>
  <li>Screen Resolution: <?php echo $this->screen['width'].'x'.$this->screen['height']; ?></li>
  <li>Browser Size: <?php echo $this->browser['width'].'x'.$this->browser['height']; ?></li>

</ul>

</div>
