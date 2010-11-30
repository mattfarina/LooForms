<?php

/**
 * @file
 * A Form Element.
 *
 * @author Matt Farina <matt@mattfarina.com>
 * @license http://opensource.org/licenses/lgpl-2.1.php The GNU Lesser GPL (LGPL) or an MIT-like license.
 */

class LooForm extends LooElement {

  protected $groupManger = NULL;

  /**
   * Build a form.
   *
   * @param array $elements
   *   An arran of elements to add to the form.
   *
   * @param mixed $group
   *   NULL to use LooGroup, a string with the name of a class to instance for
   *   the grouping, or an object implementing LooGroupInterface to use.
   */
  public function __constuct(array $elements = array(), $group = NULL) {
    if (isset($group) && is_string($group)) {
      $this->groupManager = new $group;
    }
    elseif (isset($group) && is_object($group)) {
      $this->groupManager = $group;
    }
    else {
      $this->groupManger = new LooGroup();
    }

    $this->groupManger->setGroup($this);

    if (!empty($elements)) {
      $this->groupManager->setElements($elements);
    }
  }

  public function render() {
    $output = $this->prefix . "\n";
    $output .= "<form" . $this->renderAttributes($this->attributes) . ">\n"
    $output .= $this->groupManager->render() ."\n";
    $output .= "</form>\n";
    $output .= $this->suffix . "\n";
    return $output;
  }

  /**
   * This is a stub function so we can use the abstract class. We don't
   * actually need it.
   */
  public function html() {
    return;
  }
  
  public function label($label) {
    throw new Exception('Labels are not implemented on LooForm.');
  }

  public function labelAttributes($attributers) {
    throw new Exception('Labels are not implemented on LooForm.');
  }

  public function addElement($element) {
    return $this->groupManager->addElement($element);
  }

  public function getElements() {
    return $this->groupManager->getElements();
  }

  public function setElements($elements) {
    $this->groupManager->setElements($elements);
  }

}