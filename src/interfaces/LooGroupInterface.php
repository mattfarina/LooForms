<?php

/**
 * @file
 * Group elements like Forms and Fieldsets are group elements. This describes
 * their interface.
 *
 * @author Matt Farina <matt@mattfarina.com>
 * @license http://opensource.org/licenses/lgpl-2.1.php The GNU Lesser GPL (LGPL) or an MIT-like license.
 */

interface LooGroupInterface {

  /**
   * Add an element to the end of the elements in the group.
   *
   * @param mixed $element
   *   A string with the name of the class to create an object from or a form
   *   element object.
   *
   * @return LooElementInterface
   *   $this on the element that was just added to the group.
   */
  public function addElement($element);

  /**
   * Get all the elements currently in the group.
   *
   * @return array
   *   An array of form elements currently in the group. The order they are
   *   listed in the array is the order they will be rendered.
   */
  public function getElements();

  /**
   * Set all the elements in the group.
   *
   * @param array $elements
   *   An array of elements to set as the groups elements.
   *
   * @return LooGroupInterface
   *   $this for the current group.
   */
  public function setElements($elements);

  /**
   * Render all of the elements stored by the group.
   */
  public function render();
}