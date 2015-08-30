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
