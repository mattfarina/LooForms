<?php

/**
 * @file
 * The Grouping Class used by everything else.
 *
 * @author Matt Farina <matt@mattfarina.com>
 * @license http://opensource.org/licenses/lgpl-2.1.php The GNU Lesser GPL (LGPL) or an MIT-like license.
 */

class LooGroup implements LooGroupInterface {

  protected $elements = array();

  protected $prefix = '';

  protected $suffix = '';
  
  protected $group = NULL;
  
  public function __contruct() {
    $this->group = $this;
  }

  public function setGroup($group) {
    $this->group = $group;
  }

  public function addElement($element) {
    if (is_string($element)) {
      $newElement = new $element;
      $newElement->setParent($this->group);
      $this->elements[] = $newElement;
      return $newElement;
    }
    elseif (is_object($element)) {
      $element->setParent($this->group);
      $this->elements[] = $element;
      return $element;
    }
    else {
      throw new Exception('Invalid element added to LooGroup.');
    }
  }

  public function getElements() {
    return $this->elements;
  }

  public function setElements($elements) {
    if (is_array($elements)) {
      $this->elements = $elements;
      return $this;
    }
    else {
      throw new Exception('Invalid elements sent to LooGroup.');
    }
  }

  /**
   * Render each of the elements.
   */
  function render() {
    $output = $this->prefix;
    foreach ($this->getElements() as $element) {
      $output .= $element->render();
    }
    $output .= $this->suffix;
    return $output;
  }

  function prefix($prefix) {
    if (isset($suffix)) {
      $this->prefix = $prefix;
      return $this;
    }

    return $this->suffix;
  }

  function suffix($suffix) {
    if (isset($suffix)) {
      $this->suffix = $suffix;
      return $this;
    }

    return $this->suffix;
  }
}