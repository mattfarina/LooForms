<?php

/**
 * @file
 * Autoloading for LooForms.
 *
 * @author Matt Farina <matt@mattfarina.com>
 * @license http://opensource.org/licenses/lgpl-2.1.php The GNU Lesser GPL (LGPL) or an MIT-like license.
 */

/**
 * Setup autoloading for LooForms. It seems that autoloading is faster than
 * using require/require_once so that is the format we use here.
 */
$loader = new LooAutoload();
spl_autoload_register(array($loader, 'load'));

/**
 * The LooForms autoloader for all classes and interfaces.
 */
class LooAutoload {

  /**
   * A list of the classes and their locations to load. This is being stored in
   * and array to lookup because this is faster than other methods until you
   * get to tens of thousands of classes.
   *
   * This could be stored in a cache fine an regenerated if needed. Should look
   * into that in the future if it makes sense.
   */
  protected $classes = array(
    // Interfaces
    'LooElementInterface' => '/interfaces/LooElementInterface.php',
    'LooGroupInterface' => '/interfaces/LooGroupInterface.php',

    // Abstract classes
    'LooElement' => '/LooElement.php',
    'LooGroup' => '/LooGroup.php',
    'LooForm' => '/LooForm.php',
    'LooTextfield' => '/LooTextfield.php',
  );

  /**
   * The base path to LooForms.
   */
  protected $basePath = NULL;

  /**
   * Setup the autoloader.
   */
  public function __construct() {
    $this->basePath = dirname(__FILE__);
  }

  /**
   * Load a class.
   *
   * @param string $class
   *   The name of the class to be loaded.
   */
  public function load($class) {
    if (isset($this->classes[$class])) {
      require $this->basePath . $this->classes[$class];
    }
  }
}