<?php

/**
* Class Skeletor
* Help Controller
*/

class HelpController extends Controller {

  /*
  * construct from Controller class
  */

  public function __construct() {
    parent::__construct();
  }

  /*
  * What is skeletor
  */

  public function What_is_skeletor() {

    $this->View->render('help/what_is_skeletor', // <-- path to rendered file
                  array(
                    // declaration of extra css (always set as array), included in common/header.php
                    'extraCSS' => array('index.css', 'index2.css'),

                    // declaration of extra js (always set as array), included in common/header.php
                    'extraJS' => array('common.js'),

                    // declaration of other data
                    'exampleVar' => 'test',

                    // example of extra js data
                    'screen' => Device::detectScreenResolution(),

                    // example of extra js data
                    'browser' => Device::detectBrowserSize()
                  ));
  }

  /*
  * Code examples
  */

  public function Code_examples() {

    $this->View->render('help/code_examples', // <-- path to rendered file
                  array(
                    // declaration of extra css (always set as array), included in common/header.php
                    'extraCSS' => array('index.css'),

                    // declaration of extra js (always set as array), included in common/header.php
                    'extraJS' => array('common.js')
                  ));
  }

} // end of HelpController
