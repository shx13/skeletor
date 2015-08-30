<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<?php

  // add extra javascript (declared in the controller file)
  if(isset($this->extraJS)) {
    foreach ($this->extraJS as $xjs) {
      echo '<script src="'.Config::get('URL').'pub/js/'.$xjs.'"></script>'."\r\n";
    }
  }

  // KINT DEBUGGER
  echo '<div id="kint_debugger">';
  Kint::dump($GLOBALS, $_SERVER, $_SESSION, $this);
  echo '</div>';

?>

</body>
</html>
