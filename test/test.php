<?php

/**
 * @file
 * Basic tests. Should switch to PHPUnit.
 */

// The autoloader should load everything we need.
require '../src/Autoload.php';

class Testit extends LooElement {
  
}

$test = new Testit();
$test->disabled(TRUE)
     ->label('woot');

print_r($test);