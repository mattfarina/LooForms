<?php

/**
 * @file
 * Basic tests. Should switch to PHPUnit.
 */

// The autoloader should load everything we need.
require '../src/Autoload.php';

class Testit extends LooElement {
  public function html() {
    return;
  }
}

$test = new Testit();
$test->disabled(TRUE)
     ->label('woot');

print_r($test);